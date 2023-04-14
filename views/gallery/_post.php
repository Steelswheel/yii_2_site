<?php
use app\components\webpConverter;

$image = webpConverter::checkImage($model->imgSite);
?>

<?php if (!empty($image)) { ?>
    <div class="gallery-item">
        <a class="spotlight gallery-item-link" href="<?= $image ?>" data-title="false" data-description="<?= $model->name ?>">
            <div class="gallery-item-cover">
                <div class="gallery-item-image d-flex align-items-center justify-content-center" style="background-image: url(<?= $image ?>)"></div>
            </div>
            <img class="gallery-item-icon" src="/img/zoom.svg" alt="zoom">
        </a>
        <div class="gallery-item-description">
            <?= $model->name ?>
        </div>
    </div>
<?php } ?>