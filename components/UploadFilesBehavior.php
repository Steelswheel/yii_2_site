<?php
namespace app\components;
use app\admin\components\ResizeImg;
use app\admin\models\Files;
use yii\db\ActiveRecord;
use yii\base\Behavior;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use Yii;

class UploadFilesBehavior extends Behavior
{
    public $fields;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
            ActiveRecord::EVENT_AFTER_INSERT => 'upload'
        ];
    }

    public function beforeValidate()
    {
        foreach ($this->fields as $attribute => $regulations) {
            $fileData = UploadedFile::getInstancesByName($attribute);

            foreach ($fileData as $file) {
                if (!empty($regulations['validate']['extensions'])) {
                    if (!in_array($file->extension, $regulations['validate']['extensions'])) {
                        $this->owner->addError($attribute, 'Формат файла не поддерживается');
                    }
                }

                if (!empty($regulations['validate']['maxSize'])) {
                    if ($file->size > $regulations['validate']['maxSize']) {
                        $this->owner->addError($attribute, 'Превышен максимальный размер файла');
                    }
                }
            }
        }
    }

    public function upload() {
        foreach ($this->fields as $attribute => $regulations) {
            $fileData = UploadedFile::getInstancesByName($attribute);

            foreach ($fileData as $file) {
                $this->loadFiles(
                    $file,
                    $this->owner->tableName(),
                    $this->owner->id,
                    $attribute,
                    $regulations['path']
                );
            }
        }

        return false;
    }

    public function loadFiles($file, $model, $model_id, $attribute, $path) {
        $folder = Yii::getAlias('@file') . $path . $model_id . '/' . $model_id . '/';

        FileHelper::createDirectory($folder);

        $rand = md5(rand(0, 2000) . microtime());
        $name = $rand . '.' . $file->extension;

        $file->saveAs($folder . $name);

        if ($attribute === 'video') {
            //Заливаем файл на хостинг конвертации
            shell_exec('scp ' . $folder . $name . ' root@188.127.230.204:/root/download');
            //Переименовываем в input
            shell_exec('ssh root@188.127.230.204 "cd download; mv -f ' . $name . ' input.' . $file->extension . '"');
            //Получаем угол поворота
            $rotate = shell_exec('ssh root@188.127.230.204 "cd download; ffprobe -loglevel error -select_streams v:0 -show_entries stream_tags=rotate -of default=nw=1:nk=1 input.' .  $file->extension . '"');

            //Конвертируем, и если вверх ногами - переворачиваем
            if ((int)$rotate === 180) {
                shell_exec('ssh root@188.127.230.204 "cd download; ffmpeg -i input.' . $file->extension . ' -codec copy -map_metadata 0 -metadata:s:v:0 rotate=0 ' . $rand . '.mp4"');
            } else {
                shell_exec('ssh root@188.127.230.204 "cd download; ffmpeg -i input.' . $file->extension . ' -codec copy ' . $rand . '.mp4"');
            }
            //удаляем исходник
            shell_exec('rm -f ' . $folder . $name);
            //заливаем сконвертированное видео в папку
            shell_exec('scp root@188.127.230.204:/root/download/' . $rand . '.mp4 ' . $folder);
            //очищаем папку download на хостинге конвертации
            shell_exec('ssh root@188.127.230.204 "cd download; rm -f *"');

            $modelFile = new Files([
                'name' => $file->name,
                'model' => $model,
                'field' => $attribute,
                'model_id' => $model_id,
                'file' => $rand . '.mp4',
                'path' => $path . $model_id . '/' . $model_id . '/',
                'type' => $file->type,
                'size' => filesize($folder . $rand . '.mp4'),
                'deleted' => 0
            ]);
        } else {
            $modelFile = new Files([
                'name' => $file->name,
                'model' => $model,
                'field' => $attribute,
                'model_id' => $model_id,
                'file' => $name,
                'path' => $path . $model_id . '/' . $model_id . '/',
                'type' => $file->type,
                'size' => filesize($folder . $name),
                'deleted' => 0
            ]);
        }

        $modelFile->save();
    }

    public function getLoadedFiles($model, $model_id, $field, $thumb = false) {
        return array_map(function($item) use ($model_id, $thumb) {
            if ($thumb) {
                $folder = Yii::getAlias('@file' . $item['path']);

                $t = (new ResizeImg(array_merge(
                    ['folder' => $folder, 'name' => $item['file']],
                    ['thumb' => 132]
                )))->run();
            }

            return [
                'id' => $item['id'],
                'name' => $item['name'],
                'url' => $item['path'] . $item['file'],
                'size' => $item['size'],
                'deleted' => $item['deleted'],
                'thumb' => $thumb ? $item['path'] . $t : null
            ];
        }, Files::find()->where([
            'model_id' => $model_id,
            'model' => $model,
            'field' => $field,
            'deleted' => 0
        ])->all());
    }
}