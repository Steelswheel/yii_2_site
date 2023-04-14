<?php include Yii::getAlias('@app').'/views/site/blocks/menu.php' ?>

<section class="mb-desktop">
    <div class="container">
        <h1 class="h1">Управляющие документы</h1>
        <div class="block-file-wrapper row">
            <?php foreach (\app\models\Settings::field('doc','file',[]) as $item): ?>
                <?php if ($item['url']): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="block-file">
                            <div class="block-file__icon"><img src="/img/file-doc.webp" alt="doc-file-icon"></div>
                            <div class="block-file__content">
                                <a href="<?= $item['url']?>" target="_blank"><?= $item['name']?></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include Yii::getAlias('@app').'/views/site/blocks/footer.php' ?>









