<?php
use app\components\webpConverter;

$image = webpConverter::checkImage($model->imgSite);
?>

<div class="block-news-horizon-list__item">
    <div class="block-news-horizon" itemscope itemtype="http://schema.org/Article">
        <meta itemprop="publisher" content="Кредитный потребительский кооператив «ТРЕСТ»"/>
        <?php if (!empty($image)) { ?>
            <a href="<?= '/news/view?id='.$model->id ?>" class="block-news-horizon__img" itemprop="url">
                <img src="<?= $image ?>" alt="news-picture" itemprop="image">
            </a>
        <?php } ?>

        <div class="block-news-horizon__content">
            <a href="<?= '/news/view?id='.$model->id ?>" itemprop="url">
                <span itemprop="headline">
                    <?= $model->title ?>
                </span>
                <meta itemprop="description" content="<?= $model->title ?>" />
            </a>
            <time itemprop="datePublished" datetime="<?= (new DateTime($model->DateSite))->format('Y-m-d') ?>">
                <small>
                    <?= $model->DateSite ?>
                </small>
            </time>
        </div>
    </div>
</div>

