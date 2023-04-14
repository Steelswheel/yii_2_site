<?php

use app\models\Leeds;

function turbo_get_allow_origin() {
    $http_origin = $_SERVER['HTTP_ORIGIN'];
    if (preg_match('/^(https:\/\/(?:.*\.)?yandex\.(?:ru|by|uz|com|com\.tr))$/', $http_origin, $matches)) {
        return $matches[0];
    } else if (preg_match('/^(https:\/\/(?:.*\.)?turbopages.org)$/', $http_origin, $matches)) {
        return $matches[0];
    }
    return null;
}

$http_allow_origin = turbo_get_allow_origin();

if (is_null($http_allow_origin)) {
    // Если доступа нет, должен вернуться код ответа 403.
    http_response_code(403);
    exit('Access denied');
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

}

header("Access-Control-Allow-Origin: " . $http_allow_origin);
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: origin, content-Type, content-Length, Accept-Encoding");
header('Content-Type: application/json;charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require __DIR__ . '/../vendor/autoload.php';
    require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

    if (file_exists(__DIR__ .'/../params.php')) {
        require __DIR__ . '/../params.php';
    }

    $config = require __DIR__ . '/../config/web.php';

    $app = new yii\web\Application($config);

    $request = $app->request;

    $name = $request->post('name');
    $phone = $request->post('phone');
    $email = !empty($request->post('email')) ? $request->post('email') : '';
    $form  = !empty($request->post('form')) ? $request->post('form') : '';
    $text  = !empty($request->post('text')) ? $request->post('text') : '';

    $lead = Leeds::find()->where(['phone' => $phone])->all();

    if (empty($lead)) {
        $model = new Leeds([
            'page'  => 'Турбо-страница',
            'name'  => $name,
            'phone' => $phone,
            'email' => $email,
            'form'  => $form,
            'text'  => $text
        ]);

        $model->save();
    }

    $query = [
        'site' => 'ТРЕСТ',
        'page'  => 'Турбо-страница',
        'name'  => $name,
        'phone' => $phone,
        'email' => $email,
        'text'  => $text
    ];

    $ch = curl_init('https://crm.boggat.ru/bitrix/services/main/ajax.php?c=vaganov:api.lead&action=create&mode=class');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $html = curl_exec($ch);
    curl_close($ch);

    if ($html) {
        $data = [
            [
                'field' => 'description',
                'value' => 'Ваша заявка успешно создана'
            ],
            [
                'field' => 'link',
                'value' => ''
            ]
        ];
    } else {
        $data = [
            [
                'field' => 'description',
                'value' => 'Ошибка'
            ],
            [
                'field' => 'link',
                'value' => ''
            ]
        ];
    }

    Yii::$app->mailer->compose()
        ->setTo('voronin@kooperatiff.ru')
        ->setSubject('Сообщение с сайта')
        ->setHtmlBody(
            "<p>Имя: $name</p><p>Телефон: $phone</p><p>Страница сайта: Турбо</p><p>Почта: $email</p><p>Сообщение: $text</p>"
        )
        ->send();

    echo json_encode($data);
}