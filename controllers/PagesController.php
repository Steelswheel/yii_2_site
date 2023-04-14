<?php

namespace app\controllers;

use yii\web\Controller;

class PagesController extends Controller
{

    public $layout = '@template/index';

    public function actionIndex()
    {
        $this->view->registerMetaTag([
            'name' => 'yandex-verification',
            'content' => 'de0c4683484c184a'
        ], 'yandex-verification');

        return $this->render('index');
    }
}