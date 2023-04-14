<?php


namespace app\admin\controllers;


use app\admin\components\AttributesActions;
use app\admin\components\CustomSerializer;
use app\admin\models\Query;
use app\admin\models\QuerySearch;
use yii\filters\AccessControl;
use yii\filters\ContentNegotiator;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\Response;

class QueryController extends ActiveController
{

    public $modelClass = Query::class;


    public $serializer = [
        'class' => CustomSerializer::class,
        'collectionEnvelope' => 'items',
    ];

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
                            'actions' => ['index', 'update', 'view','create','attributes'],
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
            'index' => ['GET'],
            'view' => ['GET'],
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH','POST'],
            'delete' => ['DELETE'],
            'upload' => ['POST'],
        ];
    }


    public function actions()
    {
        $actions = parent::actions();

        $actions['index'] = [
            'class' => 'yii\rest\IndexAction',
            'modelClass' => $this->modelClass,
            'prepareDataProvider' => function () {
                return (new QuerySearch())->search(['QuerySearch'=>\Yii::$app->request->queryParams]);
            },
        ];

        $actions['attributes'] = [
            'class' => AttributesActions::class,
            'modelClass' => $this->modelClass,
        ];

        return $actions;
    }



}