<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 11.03.21
 * Time: 12:31
 */

namespace app\controllers;

use app\admin\components\Dadata;
use app\models\Query;
use Dadata\Settings;
use yii\filters\ContentNegotiator;
use yii\web\Response;

class QueryController extends \yii\rest\Controller
{

    public function behaviors()
    {
        return [
            [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ]
        ];
    }

    public function actionQuery(){

        $model = new Query(\Yii::$app->request->post());
        if (!$model->save()){
            \Yii::$app->response->setStatusCode(422,'Data Validation Failed');
            $data['error'] = $model->errors;
        }else{
            $data['check'] = '111';
        }

        return $data;

    }

    public function actionLocale(){
        $data = \Yii::$app->request->post();
        return (new Dadata())->geoAddress($data['lat'], $data['lon']);
    }


    public function actionAll(){
        return Query::getAllQuery();
    }

}