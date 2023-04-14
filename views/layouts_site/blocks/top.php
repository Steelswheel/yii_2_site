<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?><?php $this->beginPage() ?> <!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="title-page">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv=X-UA-Compatible content="IE=edge">
        <meta name=viewport content="width=device-width,initial-scale=1"> <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title> <?php $this->head() ?>


        <?php include Yii::getAlias('@template_site').'/blocks/head.php' ?>
    </head>
    <body itemscope itemtype="http://schema.org/WebPage"> <?php $this->beginBody() ?>