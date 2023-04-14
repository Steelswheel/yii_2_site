<?php
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

include Yii::getAlias('@app').'/views/site/blocks/menuIndex.php';
?>

<section class="gallery-banner d-flex flex-column justify-content-center">
    <div class="container">
        <div class="gallery-banner-content">
            <div class="gallery-banner-header">
                Фотогалерея
            </div>
            <div class="gallery-banner-text">
                В этом разделе собраны фотоснимки моментов<br>
                из жизни компании
            </div>
            <img class="d-md-none gallery-banner-image" src="/img/photo.png" alt="gallery-mobile" />
        </div>
    </div>
</section>

<?php
    $dataProvider = new ActiveDataProvider([
        'query' => $gallery,
        'pagination' => [
            'pageSize' => 6
        ]
    ]);

    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_post',
        'layout' => "<section class='gallery spotlight-group row'>{items}</section>\n{pager}",
        'options' => [
            'tag' => 'div',
            'class' => 'container'
        ],
        'itemOptions' => [
            'tag' => 'div',
            'class' => 'col-lg-6 col-md-12'
        ],
        'pager' => [
            'class' => 'app\components\CustomPager',
            'nextPageLabel' => file_get_contents(Yii::getAlias('@file/img/pagination-arrow-next.svg')),
            'prevPageLabel' => file_get_contents(Yii::getAlias('@file/img/pagination-arrow-prev.svg')),
            'maxButtonCount' => 10
        ]
    ]);
?>


<?php include Yii::getAlias('@app').'/views/site/blocks/footer.php' ?>











