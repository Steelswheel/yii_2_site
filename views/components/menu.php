<div class="main__menu">
    <div class="container-wrapper">
        <?php
        echo \yii\widgets\Menu::widget([
            'options' => [
                'class' => 'navbar-line',
            ],
            'items' => [
                ['label' => 'О проекте', 'url' => ['site/index']],
                // ['label' => 'Проекты', 'url' => ['site/page2']],
                ['label' => 'Проекты', 'url' => ['site/page2'], 'items' => [
                    ['label' => 'Этапы Этапы', 'url' => ['site/page3', 'tag' => 'new']],
                    ['label' => 'Вопросы без ответов', 'url' => ['site/page4', 'tag' => 'popular']],
                ]],
                ['label' => 'Этапы', 'url' => ['site/page3']],
                ['label' => 'Документы', 'url' => ['site/page4']],
                ['label' => 'Вопросы без ответов', 'url' => ['site/page4']],
                ['label' => 'Контакты', 'url' => ['site/page4']],

                //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
            ],
        ])
        ?>
    </div>
</div>