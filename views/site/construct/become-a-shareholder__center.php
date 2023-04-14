<h2 class="h1 text-purple text-center">
    Что нужно, чтобы стать пайщиком?
</h2>
<div class="row three-in-a-row">


    <?php foreach ($value['items'] as $key =>  $itemValue): ?>


        <div class="col-lg-4">
            <div class="three-in-a-row__item">


                <div class="three-in-a-row__item__top"><?= $key + 1?></div>
                <div class="three-in-a-row__item__content">
                    <p class="three-in-a-row__item__title">
                        <?= $itemValue['title'] ?>
                    </p>

                    <div class="three-in-a-row__item__text">
                        <?= $itemValue['text'] ?>
                    </div>
                </div>

            </div>
        </div>

    <?php endforeach; ?>

</div>