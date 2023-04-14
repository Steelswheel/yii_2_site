<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?><?php $this->beginPage() ?> <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="title-page">
    <head>

        <link rel="shortcut icon" type="image/png" href="/img/favicon.png"/>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv=X-UA-Compatible content="IE=edge">
        <meta name=viewport content="width=device-width,initial-scale=1"> <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title> <?php $this->head() ?>
        <script src="https://zachestnyibiznes.ru/js/zchb-widget.js"></script>

    </head>
    <body class="" itemscope itemtype="http://schema.org/WebPage">

    <?php $this->beginBody() ?>

    <?= $content ?>


    <?php $this->endBody() ?>


    <script src=/assets/index.bundle.js></script>

    </body>
    </html> <?php $this->endPage() ?>