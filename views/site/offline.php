<?php

/* @var $this yii\web\View */

$this->title = 'Сайт временно недоступен';

?>
<section class="site-offline">
    <div class="container-fluid">
        <div class="row site-offline-wrapper justify-content-center">
            <div class="col-auto">
                <div class="site-offline-header">
                    <div class="site-offline-header-logo">
                        <?= file_get_contents(Yii::getAlias('@file/img/404-logo.svg')) ?>
                    </div>
                    <div class="site-offline-header-text">
                        Кредитный потребительский кооператив «ТРЕСТ»
                    </div>
                </div>
            </div>
        </div>
        <div class="site-offline-content-wrapper row align-items-center">
            <div class="col-md-6 site-offline-content">
                <h1 class="site-offline-content-title">
                    Сайт временно недоступен
                </h1>
                <div class="site-offline-content-text">
                    <div class="site-offline-content-text-item">
                        В связи с техническими работами, сайт временно недоступен.
                    </div>
                    <div class="site-offline-content-text-item">
                        Мы делаем всё возможное, чтобы возобновить работу сайта в кратчайшие сроки.
                    </div>
                    <div class="site-offline-content-text-item">
                        Приносим свои извинения за предоставленные неудобства.
                    </div>
                </div>
            </div>
            <div class="col-md-6 site-offline-content-image">
                <img src="/img/offline.webp" alt="offline">
            </div>
        </div>
    </div>
</section>
