<?php include Yii::getAlias('@app').'/views/site/blocks/menu.php' ?>
<section class="contacts mb-desktop">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-6" itemscope itemtype="http://schema.org/LocalBusiness">
                <link itemprop="url" href="https://trest24.ru">
                <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                <h1 class="h1 mb-5">
                    <?= $this->title ?>
                </h1>
                <p>
                    <strong>
                        Адрес:
                    </strong>
                    <br>
                    <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                        <span itemprop="addressLocality">Москва</span>, <span itemprop="streetAddress">Красная Пресня 29</span>
                    </span>
                </p>
                <p>
                    <strong>
                        График работы:
                    </strong>
                    <br>
                    <time itemprop="openingHours" datetime="Mo-Fr 9:00−18:00">
                        Пн-пт: 9:00-18:00 (московское время)
                    </time>
                </p>
                <p>
                    <strong>
                        Рабочий телефон:
                    </strong>
                    <br>
                    <span itemprop="telephone">
                        8 800 600-50-09
                    </span>
                </p>
                <p>
                    <strong>
                        Электронная почта:
                    </strong>
                    <br>
                    <span itemprop="email">
                        info@trest24.ru
                    </span>
                </p>
                <div class="contacts-button btn-purple my-5" data-bs-toggle="modal" data-bs-target="#sendModal">
                    Позвоните мне
                </div>
            </div>
            <div class="col-lg-6 contacts-map">
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A92c4bd3f606327452fd53acece97a0ba3fa250e8834e535886f75b0b9fc205dd&amp;source=constructor" width="100%" height="520" frameborder="0"></iframe>
            </div>
            <div class="d-lg-none">
                <div class="form-wrapper form-wrapper--center">
                    <div class="form-submission">
                        <div class="form-group-site">
                            <label for="">
                                Имя:
                            </label>
                            <input class="form-control-input" name="name" type="text">
                        </div>
                        <div class="form-group-site">
                            <label for="">
                                Телефон:
                            </label>
                            <input class="form-control-input" name="phone" type="text" placeholder="+7 (___) ___-__-__" inputmode="text">
                        </div>
                        <a class="btn-purple" data-action="send" data-visible="true">
                            Оставить заявку
                        </a>
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
        </div>
    </div>
</section>
<?php include Yii::getAlias('@app').'/views/site/blocks/footer.php' ?>









