<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'language' => 'ru-RU',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'site/index',

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@file' => '@app/web',
        // '@template_dev' => '@app/views/layouts_dev',
        '@template' => YII_TEMPLATE_DEV
            ? '@app/views/layouts_dev'
            : '@app/views/layouts',
    ],
    'modules' => [
        'admin' => [
            'class' => \app\admin\Module::class,
        ],
    ],
    'components' => [
        'session' => [
            'cookieParams' => [
                'lifetime' => 180,
            ]
        ],
        'authManager' => [
            'class' => \yii\rbac\PhpManager::class,
        ],
        'assetManager' => [
            'bundles' => [
                \yii\web\JqueryAsset::class => false,
                \yii\web\YiiAsset::class => false,
                \yii\widgets\ActiveFormAsset::class => false,
                \yii\bootstrap\BootstrapAsset::class => false,
                \yii\bootstrap\BootstrapPluginAsset::class => false,
                /*'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[]
                ],*/
            ],
        ],
        'request' => [
            'parsers' => [
                'application/json' => \yii\web\JsonParser::class,
                'multipart/form-data' => \app\admin\components\MultipartFormDataParserJSON::class,
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',

                'admin_api/<controller:\w+>' => 'admin/<controller>/index',
                'admin_api/<controller:\w+>/<id:\d+>' => 'admin/<controller>/view',
                'admin_api/<controller:\w+>/<action:\w+>/<id:\d+>' => 'admin/<controller>/<action>',
                'admin_api/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',

                'admin' => 'admin/default/index',
                'admin/<action>' => 'admin/default/index',
                'admin/<action>/<action2>' => 'admin/default/index',

                '<action:(about|cabinet|contacts|dir|doc|error|mission|requisites)>' => 'site/<action>'
            ],
        ],

    ],
    'params' => $params,
    'on beforeRequest' => function () {
        if (Yii::$app->params['siteOffline']) {
            return Yii::$app->catchAll = [
                'site/offline',
                'message' => 'сайт не доступен'
            ];
        }
        return false;
    }
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
