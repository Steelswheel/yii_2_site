<?php
use app\components\webpConverter;

include Yii::getAlias('@app').'/views/site/blocks/menu.php';

$pattern = '#(?<!\])\b(http||https)://[^\s\[<]+#i';
$replacement = '<noindex>${0}</noindex>';

$text = preg_replace($pattern, $replacement, $model->text);

$video = $model->getVideo($model->tableName(), $model->id, 'video');

if (!empty($video)) {
    $image = false;
} else {
    $image = webpConverter::checkImage($model->imgSite);
}

$date = $model->getDateSite();

$schemaDate = (new DateTime($date))->format('Y-m-d');
?>

<section>
    <div class="container" itemscope itemtype="http://schema.org/Article">
        <meta itemprop="publisher" content="Кредитный потребительский кооператив «ТРЕСТ»"/>
        <h1 class="h1" itemprop="headline">
            <?= $model->title ?>
        </h1>
        <?php if (!empty($image)) { ?>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <img class="img-max" src="<?= $image ?>" alt="news-picture" itemprop="image">
                </div>
            </div>
        <?php } ?>
        <?php if (!empty($video)) { ?>
            <div class="news-item-video mt-2" itemscope itemtype="http://schema.org/VideoObject">
                <meta itemprop="datePublished" content="<?= $schemaDate ?>">
                <video src="<?= $video ?>" controls autoplay></video>
            </div>
        <?php } ?>
        <div style="text-align: center"></div>
        <div class="my-5" itemprop="description">
            <?= $text ?>
        </div>
        <div class="my-5">
            <time itemprop="datePublished" datetime="<?= (new DateTime($model->DateSite))->format('Y-m-d') ?>">
                <small>
                    <?= $model->DateSite ?>
                </small>
            </time>
        </div>
    </div>
</section>

<?php include Yii::getAlias('@app').'/views/site/blocks/footer.php' ?>











