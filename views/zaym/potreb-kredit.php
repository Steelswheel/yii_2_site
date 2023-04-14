<?php include Yii::getAlias('@app') . '/views/site/blocks/menu.php' ?>

<div itemscope itemtype="http://schema.org/Service">
    <section class="block-dotted-line">
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="h1">
                        <meta itemprop="serviceType" content="Займ потребительский">
                        <span itemprop="name">
                            Займ <br>потребительский
                        </span>
                    </h1>
                    <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                        <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                        <link itemprop="url" href="https://trest24.ru/">
                        <meta itemprop="telephone" content="8 800 600-50-09">
                        <meta itemprop="email" content="info@trest24.ru">
                        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                            <meta itemprop="addressLocality" content="Москва">
                            <meta itemprop="streetAddress" content="Красная Пресня 29">
                        </div>
                    </div>
                    <div class="block-dashed" itemprop="description">
                        ТРЕСТ предлагает займ на любые цели (отдых, лечение и т.п.)
                        на предельно выгодных условиях. Низкие проценты и минимум требуемых документов.
                    </div>
                </div>
                <div class="col-lg-5 img-padding">
                    <img class="img-max" src="/img/men-in-glasses.webp" alt="Займ <br>потребительский" itemprop="image">
                </div>
            </div>
        </div>
    </section>
    <section class="blocks-square">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <ul class="row list-border-center">
                        <li>
                            <div class="list-border-center__icon">
                                <img src="/img/check.webp" alt="Выдача займа не привязана к Вашей кредитной истории">
                            </div>
                            <h3 class="list-border-center__title">
                                Выдача займа не привязана к Вашей кредитной истории
                            </h3>
                            <p class="list-border-center__text">
                                Это означает, что мы индивидуально подходим к Вашей кредитной истории
                            </p>
                        </li>
                        <li>
                            <div class="list-border-center__icon">
                                <img src="/img/check.webp" alt="Получение займа в день обращения">
                            </div>
                            <h3 class="list-border-center__title">
                                Получение займа в день обращения
                            </h3>
                            <p class="list-border-center__text">
                                Обычно рассмотрение заявки на кредитование занимает до 1 дня. Скорее всего Вы получите
                                займ уже в день обращения! При этом скорость получения абсолютно не влияет на стоимость
                                займа
                            </p>
                        </li>
                        <li>
                            <div class="list-border-center__icon">
                                <img src="/img/check.webp" alt="Вам понадобится минимум документов">
                            </div>
                            <h3 class="list-border-center__title">
                                Минимум документов
                            </h3>
                            <p class="list-border-center__text">
                                Для получения займа Вам понадобится минимальный пакет документов.
                            </p>
                        </li>
                        <li>
                            <div class="list-border-center__icon">
                                <img src="/img/check.webp" alt="Условия предоставления потребительских займов">
                            </div>
                            <h3 class="list-border-center__title">
                                Условия предоставления потребительских займов
                            </h3>
                            <p class="list-border-center__text">
                                При досрочном частичном или полном погашении займа дополнительная комиссия не взимается.
                                Уставом кооператива предусмотрена уплата членского и добровольного паевого взноса.
                                При исполнении обязательств по договору займа, добровольный паевой взнос
                                возвращается в полном объеме.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="consumer mb-desktop">
        <div class="text-center d-none d-lg-block">
            <a class="btn-purple" data-bs-toggle="modal" data-bs-target="#sendModal">
                Оставить заявку
            </a>
        </div>
        <div class="d-lg-none">
            <div class="form-wrapper form-wrapper--center">
                <div class="form-submission">
                    <div class="form-group-site">
                        <label for="">Имя:</label>
                        <input class="form-control-input" name="name" type="text">
                    </div>
                    <div class="form-group-site">
                        <label for="">Телефон:</label>
                        <input class="form-control-input" name="phone" type="text" placeholder="+7 (___) ___-__-__" inputmode="text">
                    </div>
                    <a class="btn-purple" data-action="send" data-visible="true">Оставить заявку</a>
                    <div class="preloader" data-role="preloader" data-visible="false"></div>
                    <div class="form-sogl">
                        Я даю своё согласие на обработку персональных данных
                    </div>
                </div>
                <div class="form-submission--success">
                    Заявка успешно отправлена
                </div>
            </div>
        </div>
    </section>
</div>

<?php include Yii::getAlias('@app').'/views/site/blocks/footer.php' ?>