<?php
namespace app\admin\components;

use yii\rest;
use Yii;

class GetTokenAction extends rest\Action
{
    public function run() {
        if (!empty(Yii::$app->request->post())) {
            $_SESSION['token'] = Yii::$app->request->post();

            return 'Success';
        } else {
            $_SESSION['token'] = false;

            return 'Failed to get token';
        }
    }
}