<?php include Yii::getAlias('@app').'/views/site/blocks/menu.php' ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="h1" itemprop="name">Отзывы</h1>

                <div class="block-dashed mb-3" itemprop="description">
                    Здесь Вы можете почитать отзывы о нас или же написать свой.
                    Мы будем рады честной оценке нашей работы!
                </div>

                <div class="d-none d-lg-block">
                    <a class="btn-purple mt-5" data-bs-toggle="modal" data-bs-target="#reviewModal">Оставить отзыв</a>
                </div>

                <div class="d-lg-none text-center">
                    <a class="btn-purple mt-5" data-bs-toggle="modal" data-bs-target="#reviewModal">Оставить отзыв</a>
                </div>

            </div>
            <div class="col-md-5 d-none d-lg-block">
                <img src="/img/rev-1.webp" alt="Займ по программе Региональный семейный капитал" itemprop="image">
            </div>
        </div>
    </div>
</section>

<section class="review-section">
        <?php
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => \app\models\Reviews::find()
                ->orderBy('added desc')
                ->where(['<=','added', date('Y-m-d').' 23:59:59'])
                ->andWhere(['active' => 1]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        echo \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_post',
            'layout' => "<div class='review-section-items row'>{items}</div>\n{pager}",
            'options' => [
                'tag' => 'div',
                'class' => 'container'
            ],
            'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-lg-6 col-md-12',
                'style' => 'margin: 7px 0;'
            ],
            'pager' => [
                'class' => 'app\components\CustomPager',
                'nextPageLabel' => file_get_contents(Yii::getAlias('@file/img/pagination-arrow-next.svg')),
                'prevPageLabel' => file_get_contents(Yii::getAlias('@file/img/pagination-arrow-prev.svg')),
                'maxButtonCount' => 10
            ],
        ]);
        ?>
</section>

<?php include Yii::getAlias('@app').'/views/site/blocks/footer.php' ?>
