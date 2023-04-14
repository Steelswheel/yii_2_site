<?php include Yii::getAlias('@app') . '/views/site/blocks/menu.php' ?>

<div itemscope itemtype="http://schema.org/Service">
    <section class="block-dotted-line">
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="h1">
                        <meta itemprop="serviceType" content="Займ под залог недвижимости">
                        <span itemprop="name">
                            Займ <br>под залог недвижимости
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
                        Займ под залог — позволяет быстро получить крупную сумму денег. В заложенной недвижимости
                        можно продолжать проживать, сдавать в аренду или использовать для предпринимательских целей.
                    </div>
                </div>
                <div class="col-lg-5 img-padding">
                    <img class="img-max" src="/img/z-home.webp" alt="Займ под залог недвижимости" itemprop="image">
                </div>
            </div>
        </div>
    </section><section class="estate-block">
        <div class="container">
            <div class="text-center">
                <h2 class="h1 text-purple mt-5">
                    Кто может получить займ под залог недвижимости?
                </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-10">
                    <ul class="yellow-shield">
                        <li>
                            <strong>
                                Индивидуальные предприниматели, руководители и собственники бизнеса
                            </strong>
                            <div class="yellow-shield-text">
                                На открытие и развитие бизнеса. Чаще всего средства используются на приобретение
                                основных средств, на пополнение оборотых средств, на покрытие кассовых разрывов,
                                на участие в тендерах, на зарплату сотрудникам и оплату аренды. Иногда в ожидании
                                решения банка по крупному кредиту у нас оформляют заем, чтобы не упустить
                                выгодную сделку.
                            </div>
                        </li>
                        <li>
                            <strong>
                                Физические лица (в т.ч. предпенсионного и пенсионного возраста)
                            </strong>
                            <div class="yellow-shield-text">
                                Для оперативного решения финансовых вопросов: на приобретение новой квартиры на время
                                продажи старой, на обучение детей и внуков, на дорогостоящее лечение,
                                на автомобиль и другие крупные покупки.
                            </div>
                        </li>
                        <li>
                            <strong>
                                Лица, которым отказали в выдаче кредита в банке
                            </strong>
                            <div class="yellow-shield-text">
                                Причинами для отказа может быть плохая кредитная история или ее отсутствие,
                                неофициальное трудоустройство, большая кредитная нагрузка, долги
                                по исполнительному производству.
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section-zalog">
        <div class="container" style="background-image: url(/img/men.webp);">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="h1 text-purple mt-0 mb-3">
                        Что может служить залогом?
                    </h2>
                    <br>
                </div>
                <div class="col-lg-6">
                    <ul class="list-num">
                        <li>
                            <strong>
                                Приобретаемое жилье или другая недвижимость
                            </strong>
                            <p>
                                Это касается займов, которые оформляются на покупку объекта недвижимости.
                                Вы будете жить в новой квартире, и расплачиваться за нее постепенно.
                            </p>
                        </li>
                        <li>
                            <strong>
                                Объект недвижимости, который не принадлежит заемщику
                            </strong>
                            <p>
                                Залог могут предоставить родственники, друзья или партнеры заемщика
                            </p>
                        </li>
                        <li>
                            <strong>
                                Жилой дом, квартира, комната, дача, садовый дом с земельным участком, коммерческая недвижимость
                            </strong>
                            <p>
                                При этом жилое помещение может быть единственным и из него не нужно выписываться.
                                Недвижимость остается в Вашей собственности, Вы продолжаете ею пользоваться,
                                а на объект накладывается обременение на время действия договора.
                            </p>
                        </li>
                    </ul>
                    <div class="list-num__none">
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
                    </div>
                    <div class="d-lg-none">
                        <img src="/file/upload/2b9448f5ab7960c37993b2bae62f31e9.png" alt="mail-icon" class="img-max">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include Yii::getAlias('@app').'/views/site/blocks/footer.php' ?>