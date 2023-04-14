<?php
    use app\components\webpConverter;

    $date = $model->getDateSite();

    $schemaDate = (new DateTime($date))->format('Y-m-d');

    $email = '';

    if (!empty($model->email)) {
        $email_name = explode('@', $model->email);
        $arr = str_split($email_name[0]);

        for ($x = round(strlen($email_name[0])/2) - 1; $x < strlen($email_name[0]); $x++) {
            $arr[$x] = '*';
        }

        $email_name[0] = implode($arr);
        $email = implode('@', $email_name);
    }

    $images = $model->getImages($model->tableName(), $model->id, 'img');
    $webpImages = [];

    if (!empty($images['thumbs'])) {
        foreach ($images['thumbs'] as $image) {
            $webpImages['thumbs'][] = webpConverter::checkImage($image);
        }
    }

    if (!empty($images['files'])) {
        foreach ($images['files'] as $image) {
            $webpImages['files'][] = webpConverter::checkImage($image);
        }
    }

    $video = $model->getVideo($model->tableName(), $model->id, 'video');
?>

<div class="review-section-item" data-role="review-item" itemprop="review" itemscope itemtype="http://schema.org/Review">
    <link itemprop="url" href="https://trest24.ru/reviews"/>
    <div class="review-section-item-wrap d-flex flex-column justify-content-between">
        <div class="review-section-item-header">
            <div class="d-flex flex-wrap justify-content-between">
                <div class="review-section-item-name" itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <span itemprop="name">
                        <?= $model->name ?>
                    </span>
                    <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                        <meta itemprop="addressLocality" content="<?= $model->city ?>">
                    </div>
                </div>
                <div class="review-section-item-email d-flex align-items-center justify-content-end">
                    <?php if (!empty($email)) { ?>
                        <span>
                            <?= $email ?>
                        </span>
                        <div class="review-section-item-email-icon">
                            <?= file_get_contents(Yii::getAlias('@file/img/verified_icon.svg')) ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <?php if (!empty($model->link)) { ?>
                    <noindex><a href="<?= $model->link ?>" target="_blank" class="review-section-item-link">
                        <?= $model->link ?>
                    </a></noindex>
                <?php } ?>
                <?php if (!empty($model->company)) { ?>
                    <div class="review-section-item-company">
                        <?= $model->company ?>
                    </div>
                <?php } ?>
            </div>
            <div class="review-section-item-text-wrapper">
                <div class="review-section-item-text" data-role="review-text" data-state="hide" itemprop="reviewBody">
                    <?= $model->text ?>
                </div>
                <div class="review-section-item-text-more" data-role="show-more" data-state="hide">
                    Читать весь отзыв
                </div>
            </div>
            <?php if (!empty($webpImages['thumbs'])) { ?>
                <div class="review-section-item-images d-flex flex-wrap spotlight-group" data-role="previews">
                    <?php for ($i = 0; $i < count($webpImages['thumbs']); $i++) { ?>
                        <a class="spotlight review-section-item-image" href="<?= $webpImages['files'][$i] ?>" data-title="false">
                            <div class="review-section-item-image-item" style="background-image: url(<?= $webpImages['thumbs'][$i] ?>)"></div>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if (!empty($video)) { ?>
                <div class="reviews-section-item-video mt-2" itemscope itemtype="http://schema.org/VideoObject">
                    <meta itemprop="datePublished" content="<?= $schemaDate ?>">
                    <video src="<?= $video ?>" controls></video>
                </div>
            <?php } ?>
        </div>
        <div itemprop="itemReviewed" itemscope itemtype="https://schema.org/LocalBusiness">
            <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
            <link itemprop="url" href="https://trest24.ru/"/>
            <meta itemprop="telephone" content="8 800 600-50-09">
            <meta itemprop="email" content="info@trest24.ru">
            <meta itemprop="openingHours" content="Mo-Fr 9:00−18:00">
            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                <meta itemprop="addressLocality" content="Москва">
                <meta itemprop="streetAddress" content="Красная Пресня 29">
            </div>
        </div>
        <div class="review-section-item-footer d-flex justify-content-between">
            <div class="review-section-item-date">
                <meta itemprop="datePublished" content="<?= $schemaDate ?>"/>
                <time datetime="<?= $schemaDate ?>">
                    <?= $date ?>
                </time>
            </div>
            <div class="review-section-item-city">
                <?= $model->city ?>
            </div>
        </div>
    </div>
    <?php if (!empty($webpImages['files'])) { ?>
        <div class="review-section-item-gallery-wrapper" data-role="review-gallery-wrapper" data-visible="false">
            <div class="review-section-item-gallery">
                <div class="swiper" data-role="review-gallery">
                    <div class="swiper-wrapper">
                        <?php foreach ($webpImages['files'] as $image) { ?>
                            <div class="swiper-slide">
                                <div class="review-section-item-gallery-item">
                                    <img src="<?= $image ?>" alt="review-image" itemprop="image">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>




