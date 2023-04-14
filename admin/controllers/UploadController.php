<?php


namespace app\admin\controllers;


use app\admin\components\AttributesActions;
use app\admin\components\CustomSerializer;
use app\admin\models\News;
use app\admin\models\NewsSearch;
use yii\filters\AccessControl;
use yii\filters\ContentNegotiator;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\rest\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

class UploadController extends Controller
{



    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                [
                    'class' => ContentNegotiator::class,
                    'formats' => [
                        'application/json' => Response::FORMAT_JSON,
                    ],
                ],
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['editor', 'upload'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],

                    ],
                ],
            ]
        );
    }

    protected function verbs()
    {
        return [
            'editor' => ['POST'],

        ];
    }

    public function actionUpload() {
        $fileData = UploadedFile::getInstanceByName('upload');
        $folder = \Yii::getAlias("@file".'/file/upload/');
        FileHelper::createDirectory($folder);
        $upload = $fileData->saveAs($folder . $fileData->name);

        if ($upload) {
            $img = getimagesize($folder . $fileData->name);
        }

        return [
            'img' => $img,
            'upload' => $upload,
            'f' => $folder,
            'url' => '/file/upload/' . $fileData->name
        ];
    }

    public function actionEditor(){


        $fileData = UploadedFile::getInstanceByName('image');
        $name = md5(rand(0,2000) . microtime() ).'.'. $fileData->extension;
        $folder = \Yii::getAlias("@file".'/file/editor/');
        FileHelper::createDirectory($folder);
        $fileData->saveAs($folder.$name);


        return [
            'f' => $folder,
            'url' => '/file/editor/'.$name
        ];
    }



}