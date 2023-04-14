<?php
namespace app\admin\components;

use app\admin\models\Files;
use yii\base\DynamicModel;
use yii\db\ActiveRecord;
use yii\base\Behavior;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class FilesBehavior extends Behavior
{
    public $model;
    public $path;
    public $mainFolder = 'foto';
    public $files;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
            ActiveRecord::EVENT_AFTER_INSERT => 'updateFile',
            ActiveRecord::EVENT_AFTER_UPDATE => 'updateFile',
        ];
    }

    /**
     * Валидация файлов
     *
     * */
    public function beforeValidate()
    {
        $fileData = [];

        foreach ($this->files as $attribute => $regulations) {
            if (is_array($this->owner->{$attribute})) {
                foreach ($this->owner->{$attribute} as $itemFile) {
                    if (isset($itemFile['file'])) {
                        if ($regulations['validate']['maxFiles'] > 1) {
                            $fileData[$attribute][] = UploadedFile::getInstancesByName($itemFile['file'])[0];
                        } else {
                            $fileData[$attribute] = UploadedFile::getInstancesByName($itemFile['file'])[0];
                        }
                        $validate[] = array_merge([[$attribute],'file'],$regulations['validate']);;
                    }
                }
            }
        }

        if (count($fileData) > 0) {
            $model = DynamicModel::validateData($fileData, $validate);

            if ($model->hasErrors()) {
                foreach ($model->errors as $erAttribute => $message) {
                    $this->owner->addError($erAttribute, $message);
                }
            }

            foreach ($this->files as $attribute => $regulations) {

                // Проверка на кол-во файлов из базы
                if ($regulations['validate']['maxFiles'] > 1 && isset($fileData[$attribute])) {

                    $countData = count($fileData[$attribute]);

                    $countDB = Files::find()
                        ->where([
                            'model_id' => $this->owner->id,
                            'model' => $this->owner->tableName(),
                            'field' => $attribute,
                            'deleted' => 0
                        ])->count();

                    if ($countData + $countDB >  $regulations['validate']['maxFiles']){
                        $this->owner->addError($attribute, "Вы не можете загружать более {$regulations['validate']['maxFiles']} файла");
                    }
                }
            }
        }
    }

    public function updateFile()
    {
        if (!$this->files) return false;

        foreach ($this->files as $attribute => $itemFile) {
            if (is_array($this->owner->{$attribute})) {
                $beforeSaveFile = isset($itemFile['beforeSaveFile'])
                    ? $itemFile['beforeSaveFile']
                    : null;

                FilesBehavior::loadFile(
                    $this->owner->tableName(),
                    $this->owner->id,
                    $attribute,
                    $itemFile['validate']['maxFiles'] > 1,
                    '/file/'.$this->owner->tableName().'/'.$this->owner->id,
                    $this->owner->{$attribute},
                    $beforeSaveFile
                );
            }
        }
    }

    public function __get($attribute)
    {
        return FilesBehavior::getLoadFile($this->owner->tableName(), $this->owner->id, $attribute);
    }

    public static function addFile($file)
    {
        $modelFile = new Files([
            'name' => $file['name'],
            'model' => $file['model'],
            'field' => $file['field'],
            'model_id' => $file['model_id'],
            'file' => $file['file'],
            'path' => $file['path'],
            'deleted' => 0
        ]);

        $modelFile->save();
    }

    public static function removeAllFiles($model, $model_id, $attribute)
    {
        Files::updateAll([
            'deleted' => 1
        ],[
            'model_id' => $model_id,
            'model' => $model,
            'field' => $attribute,
            'deleted' => 0
        ]);
    }

    public static function removeOneFile($id, $model, $model_id, $attribute)
    {
        Files::updateAll([
            'deleted' => 1
        ], [
            'id' => $id,
            'model_id' => $model_id,
            'model' => $model,
            'field' => $attribute,
            'deleted' => 0
        ]);
    }

    public static function loadFile($model, $model_id, $attribute, $isMulti, $path, $file, $beforeSaveFile = null)
    {
        $a = $isMulti;

        foreach ($file as $item) {
            if (isset($item['file'])) {
                if (!$isMulti)
                    FilesBehavior::removeAllFiles($model, $model_id, $attribute);

                $fileData = UploadedFile::getInstancesByName($item['file'])[0];

                $rand = md5(rand(0,2000) . microtime() );
                $name = $rand . '.' . $fileData->extension;
                $folder = \Yii::getAlias("@file" . $path . '/' . $model_id . '/');
                FileHelper::createDirectory($folder);
                $fileData->saveAs($folder . $name);

                $dataResizeImg = [
                    'folder' => $folder,
                    'name' => $name,
                ];
                if ($beforeSaveFile) {
                    $class = $beforeSaveFile['class'];

                    (new $class(
                        array_merge($dataResizeImg,$beforeSaveFile['settings'])
                     ))->run();
                }

                // Миниатюра для картинок
                (new ResizeImg(
                    array_merge($dataResizeImg,['thumb' => 300]))
                )->run();

                if ($attribute === 'video') {
                    //Заливаем файл на хостинг конвертации
                    shell_exec('scp ' . $folder . $name . ' root@188.127.230.204:/root/download');
                    //Переименовываем в input
                    shell_exec('ssh root@188.127.230.204 "cd download; mv -f ' . $name . ' input.' . $fileData->extension . '"');
                    //Получаем угол поворота
                    $rotate = shell_exec('ssh root@188.127.230.204 "cd download; ffprobe -loglevel error -select_streams v:0 -show_entries stream_tags=rotate -of default=nw=1:nk=1 input.' .  $fileData->extension . '"');
                    //Конвертируем, и если вверх ногами - переворачиваем
                    if ((int)$rotate === 180) {
                        shell_exec('ssh root@188.127.230.204 "cd download; ffmpeg -i input.' . $fileData->extension . ' -codec copy -map_metadata 0 -metadata:s:v:0 rotate=0 ' . $rand . '.mp4"');
                    } else {
                        shell_exec('ssh root@188.127.230.204 "cd download; ffmpeg -i input.' . $fileData->extension . ' -codec copy ' . $rand . '.mp4"');
                    }
                    //удаляем исходник
                    shell_exec('rm -f ' . $folder . $name);
                    //заливаем сконвертированное видео в папку
                    shell_exec('scp root@188.127.230.204:/root/download/' . $rand . '.mp4 ' . $folder);
                    //очищаем папку download на хостинге конвертации
                    shell_exec('ssh root@188.127.230.204 "cd download; rm -f *"');

                    $modelFile = new Files([
                        'name' => $fileData->name,
                        'model' => $model,
                        'field' => $attribute,
                        'model_id' => $model_id,
                        'file' => $rand . '.mp4',
                        'path' => $path . '/' . $model_id . '/',
                        'type' => $fileData->type,
                        'size' => filesize($folder . $rand . '.mp4'),
                        'deleted' => 0
                    ]);
                } else {
                    $modelFile = new Files([
                        'name' => $fileData->name,
                        'model' => $model,
                        'field' => $attribute,
                        'model_id' => $model_id,
                        'file' => $name,
                        'path' => $path . '/' . $model_id . '/',
                        'type' => $fileData->type,
                        'size' => filesize($folder.$name),
                        'deleted' => 0
                    ]);
                }

                $modelFile->save();
            } else {
                if ($item['deleted'] === 1) {
                    FilesBehavior::removeOneFile($item['id'], $model, $model_id, $attribute);
                }
            }
        }
    }

    public static function getLoadFile($model,$model_id,$attribute){
        $filesSearch = Files::find();
        $filesSearch->where([
            'model_id' => $model_id,
            'model' => $model,
            'field' => $attribute,
            'deleted' => 0
        ]);

        return array_map(function($item) {
            $folder = \Yii::getAlias('@file' . $item['path']);

            $thumb = (new ResizeImg(
                array_merge([
                    'folder' => $folder,
                    'name' => $item['file'],
                ],['thumb' => 300]))
            )->run();

            return [
                'id' => $item['id'],
                'name' => $item['name'],
                'url' => $item['path'].$item['file'],
                'size' => $item['size'],
                'deleted' => $item['deleted'],
                'thumb' => $thumb ? $item['path'].$thumb : null,
                'loaded' => $item['youtube_load']
            ];
        }, $filesSearch->all());
    }
}