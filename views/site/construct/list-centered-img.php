<section class="list-centered-img">
    <div class="container">
        <h1 class="h1">
            <?= $value['title'] ?>
        </h1>
        <div class="row">
            <div class="col-lg-7 order-1">
                <ul class="list-yellow-shield">
                    <?php foreach ($value['items'] as $itemValue): ?>
                        <li>
                            <div class="list-yellow-shield-text">
                                <?= $itemValue['text'] ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-5 order-2">
                <?php if (isset($value['mainImg'])): ?>
                    <img class="img-max" src="<?= $value['mainImg'][0]['url'] ?>" alt="<?= $value['title'] ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>