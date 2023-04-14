<?php
namespace app\components;
use app\admin\components\ResizeImg;
use app\admin\models\Files;
use yii\db\ActiveRecord;
use yii\base\Behavior;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use Yii;

class UploadImagesBehavior extends Behavior
{
    public $params;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'setImages',
            ActiveRecord::EVENT_AFTER_INSERT => 'upload'
        ];
    }

    public function setImages()
    {
        if (!empty($this->params['image_fields'])) {
            foreach ($this->params['image_fields'] as $field) {
                $this->owner->{$field} = UploadedFile::getInstancesByName($field);
            }
        }
    }

    public function createFileArray($file, $name, $path, $field) {
        return [
            'name' => $file->name,
            'model' => $this->owner->tableName(),
            'field' => $field,
            'model_id' => $this->owner->id,
            'file' => $name,
            'path' => $path,
            'type' => $file->type,
            'size' => $file->size,
            'deleted' => 0
        ];
    }

    public function getLoadedImages($model, $model_id, $field) {
        return array_map(function($item) {
            $folder = \Yii::getAlias("@file".$item['path']);

            $thumb = (new ResizeImg(array_merge(
                ['folder' => $folder, 'name' => $item['file']],
                ['thumb' => 300]
            )))->run();

            return [
                'id' => $item['id'],
                'name' => $item['name'],
                'url' => $item['path'].$item['file'],
                'size' => $item['size'],
                'deleted' => $item['deleted'],
                'thumb' => $thumb ? $item['path'].$thumb : null
            ];
        }, Files::find()->where([
            'model_id' => $model_id,
            'model' => $model,
            'field' => $field,
            'deleted' => 0
        ])->all());
    }

    public function addToDb($file)
    {
        $modelFile = new Files($file);
        $modelFile->save();
    }

    public function upload() {
        if (empty($this->params['image_fields'])) {
            return false;
        }

        foreach ($this->params['image_fields'] as $field) {
            if (empty($this->owner->{$field})) {
                return false;
            }

            foreach ($this->owner->{$field} as $index => $file) {
                $name = md5(rand(0, 2000).microtime()).'.'.$file->extension;
                $folder = Yii::getAlias("@file".$this->params['path'].$this->owner->id.'/');

                if (FileHelper::createDirectory($folder)) {
                    $file->saveAs($folder.$name);

                    if (!empty($this->params['thumb'])) {
                        if (!empty($this->params['thumb']['class'] && !empty($this->params['thumb']['size']))) {

                            $dataResizeImg = [
                                'folder' => $folder,
                                'name' => $name,
                            ];

                            (new $this->params['thumb']['class'](
                                array_merge($dataResizeImg, ['thumb' => $this->params['thumb']['size']])
                            ))->run();
                        }
                    }

                    $fileData = $this->createFileArray($file, $name, $this->params['path'].$this->owner->id.'/', $field);
                    $this->addToDb($fileData);
                }
            }
        }

        return true;
    }
}