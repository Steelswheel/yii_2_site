<div class="three-in-a-row-after">
    <div class="row row-indent">

        <?php foreach ($value['items'] as $key =>  $itemValue): ?>

            <div class="col-md-6">
                <div class="block-purple">
                    <div class="text-center mb-4"><img src="/img/waring-icon.webp" alt="warning-icon"></div>
                    <p>
                        <?= $itemValue['text'] ?>
                    </p>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>