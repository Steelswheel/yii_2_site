<?php include Yii::getAlias('@app') . '/views/site/blocks/menu.php' ?>

<div itemscope itemtype="http://schema.org/Service">
    <section class="block-dotted-line">
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="h1">
                        <meta itemprop="serviceType" content="Займ по программе «Региональный семейный капитал»">
                        <span itemprop="name">
                            Займ по программе <br>«Региональный семейный капитал»
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
                        Региональный семейный капитал (РСК) или Областной материнский (семейный) — установлен Законом
                        той области, в которой проживает гражданин. Семейный капитал предоставляется гражданам
                        независимо от получения иных мер социальной поддержки, предусмотренных федеральным
                        и региональным законодательством, если ранее они не воспользовались правом на его получение.
                        <br><br>
                        Размер регионального семейного капитала устанавливается на уровне каждой области отдельно
                        и составляет от 100 000 руб. до 1 000 000 руб.
                    </div>
                </div>
                <div class="col-lg-5 img-padding">
                    <img class="img-max" src="/img/z-rsk-img.webp" alt="loan-picture" itemprop="image">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container blocks-rsk">
            <div class="row justify-content-md-center row-indent">
                <div class=" col-lg-4">
                    <section class="block-gray block-gray--icon-top">
                        <div class="block-gray__icon">
                            <img src="/img/yellow-shield.webp" alt="yellow-shield-icon">
                        </div>
                        <h3>
                        </h3>
                        <p class="block-gray__text">
                            ТРЕСТ осуществляет выдачу ипотечных займов с возможностью погашения
                            Региональным семейным капиталом.  Ипотечные займы выдаются на всей территории
                            Российской Федерации в зависимости от места проживания, Размер регионального
                            семейного капитала устанавливается на уровне каждой области отдельно и
                            составляет от 100 000 руб. до 1 000 000 руб
                        </p>
                    </section>
                </div>
                <div class=" col-lg-4">
                    <section class="block-gray block-gray--icon-top">
                        <div class="block-gray__icon">
                            <img src="/img/yellow-shield.webp" alt="yellow-shield-icon">
                        </div>
                        <h3>
                        </h3>
                        <p class="block-gray__text">
                            Право на предоставление регионального (областного) семейного капитала и порядок предоставления
                            нужно уточнять в управлении социальной защиты населения Администрации/Правительства по месту
                            проживания гражданина.
                        </p>
                    </section>
                </div>
                <div class=" col-lg-4">
                    <section class="block-gray block-gray--icon-top">
                        <div class="block-gray__icon">
                            <img src="/img/yellow-shield.webp" alt="yellow-shield-icon">
                        </div>
                        <h3>
                        </h3>
                        <p class="block-gray__text">
                            Региональный семейный капитал можно суммировать с другими федеральными
                            сертификатами — Материнским семейным капиталом и Господдержкой на третьего ребенка
                            в размере 450 000 руб.
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </section><section class="list-yellow-with-icons mb-5">
        <div class="container">
            <div class="row flex-direction-column-reverse-mobile mb-desktop">
                <div class="col-lg-6">
                    <div>
                        <img class="img-max" src="/img/z-rsk-home.webp" alt="home">
                    </div>
                    <p class="list-yellow-with-icons-text text-purple text-center mb-4">
                        Заинтересовало? <br>Оставьте заявку и мы Вам позвоним!
                    </p>
                    <div class="text-center d-none d-lg-block">
                        <a class="btn-purple" data-bs-toggle="modal" data-bs-target="#sendModal">
                            Оставить заявку
                        </a>
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
                <div class="col-lg-6">
                    <h2 class="h1 text-purple mt-0">
                        Преимущества
                    </h2>
                    <div class="list-left-icon">
                        <h3 class="list-left-icon__title">
                            Деньги выдаем быстро
                        </h3>
                        <div class="list-left-icon__icon">
                            <img src="/img/ul-1.webp" alt="Деньги выдаем быстро">
                        </div>
                        <div class="list-left-icon__text">
                            В течение 1 дня мы рассмотрим Вашу заявку. Деньги Вы получите уже через 5-7 дней
                            (после регистрации договора залога в Росреестре).
                        </div>
                    </div>
                    <div class="list-left-icon">
                        <h3 class="list-left-icon__title">
                            Лояльно относимся к кредитной истории
                        </h3>
                        <div class="list-left-icon__icon">
                            <img src="/img/ul-2.webp" alt="Лояльно относимся к кредитной истории">
                        </div>
                        <div class="list-left-icon__text">
                            Допускаем, что у Вас могут быть другие действующие кредиты.
                            Мы понимаем, что далеко не у всех кредитная история идеальна.
                        </div>
                    </div>
                    <div class="list-left-icon">
                        <h3 class="list-left-icon__title">
                            Принимаем минимальный пакет документов
                        </h3>
                        <div class="list-left-icon__icon">
                            <img src="/img/ul-3.webp" alt="Принимаем минимальный пакет документов">
                        </div>
                        <div class="list-left-icon__text">
                            Минимум документов под заёмщика и по объекту недвижимости, предоставляемому в залог
                        </div>
                    </div>
                    <div class="list-left-icon">
                        <h3 class="list-left-icon__title">
                            Не требуем страхования жизни и недвижимости
                        </h3>
                        <div class="list-left-icon__icon">
                            <img src="/img/ul-4.webp" alt="Не требуем страхования жизни и недвижимости">
                        </div>
                        <div class="list-left-icon__text">
                            Это избавит Вас от лишних затрат. При этом страховку Вы можете оформить по своему желанию.
                        </div>
                    </div>
                    <div class="list-left-icon">
                        <h3 class="list-left-icon__title">
                            Оценку объекта мы сделаем сами
                        </h3>
                        <div class="list-left-icon__icon">
                            <img src="/img/ul-5.webp" alt="Оценку объекта мы сделаем сами">
                        </div>
                        <div class="list-left-icon__text">
                            Сотрудники кооператива самостоятельно проведут осмотр объекта недвижимости и сделают оценку его рыночной стоимости
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include Yii::getAlias('@app').'/views/site/blocks/footer.php' ?>