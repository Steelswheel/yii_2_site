<?php
use yii\helpers\Html;

echo Html::tag("p",Html::tag("b",'Имя') . ": $name");

echo Html::tag("p",Html::tag("b",'Телефон') . ": $phone");

echo Html::tag("p",Html::tag("b",'Страница сайта') . ": $page");

if (isset($email)){
    echo Html::tag("p",Html::tag("b",'Почта') . ": $email");
}

if (isset($text)){
    echo Html::tag("p",Html::tag("b",'Сообщение') . ": $text");
}