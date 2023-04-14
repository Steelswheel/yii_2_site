<?php
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

include Yii::getAlias('@app').'/views/site/blocks/menu.php';
?>

<section class="mb-desktop">
    <div class="container">
        <h1 class="h1">
            Новости
        </h1>
        <?php
            $dataProvider = new ActiveDataProvider([
                'query' => $news,
                'pagination' => [
                    'pageSize' => 6,
                ],

            ]);

            echo ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_post',
                'layout' => "<div class='block-news-horizon-list '>{items}</div>\n{pager}",
                'pager' => [
                    'class' => 'app\components\CustomPager',
                    'nextPageLabel' => file_get_contents(Yii::getAlias('@file/img/pagination-arrow-next.svg')),
                    'prevPageLabel' => file_get_contents(Yii::getAlias('@file/img/pagination-arrow-prev.svg')),
                    'maxButtonCount' => 10
                ]
            ]);
        ?>
    </div>
</section>


<?php include Yii::getAlias('@app').'/views/site/blocks/footer.php' ?>











