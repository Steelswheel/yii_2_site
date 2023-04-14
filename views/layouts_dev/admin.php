<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?><?php $this->beginPage() ?> <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv=X-UA-Compatible content="IE=edge">
        <meta name=viewport content="width=device-width,initial-scale=1"> <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title> <?php $this->head() ?>
        <meta name="google-signin-client_id" content="27940428198-jeplkg9u69qeu0a9uo6j6skj2tvp90v4.apps.googleusercontent.com">
        <script src="https://apis.google.com/js/platform.js"></script>
    </head>
    <body> <?php $this->beginBody() ?> <?= $content ?> <?php $this->endBody() ?>
    <script src=/assets/admin.bundle.js></script>
    </body>
    </html> <?php $this->endPage() ?>