<?php include Yii::getAlias('@app') . '/views/site/blocks/menuIndex.php' ?>

<div class="header-slider-wrapper" id="header-slider">
    <div class="header-slider swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide" itemscope itemtype="http://schema.org/Service">
                <div class="header-slide header-slide-1 align-items-lg-center">
                    <div class="container">
                        <div class="header-slide-buttons">
                            <div class="header-slide-image d-md-none">
                                <img src="/img/header-slide-mobile-1.png" alt="s">
                            </div>
                            <div class="header-slide-1-text d-md-none">
                                <span>Отличный весенний ход - в короткий срок</span>
                                <br>
                                <span class="purple">МАКСИМАЛЬНЫЙ ДОХОД</span>
                                <div>Срок устанавливаете Вы сами - <span class="yellow">от 1 мес.</span></div>
                            </div>
                            <button class="header-slide-link mb-4 d-lg-none" data-bs-toggle="modal" data-bs-target="#rules">
                                Правила проведения
                            </button>
                            <button class="purple-button d-none d-md-inline-block" data-bs-toggle="modal" data-bs-target="#sendModal">
                                Получить консультацию
                            </button>
                            <button class="header-slide-link d-none d-lg-inline-block" data-bs-toggle="modal" data-bs-target="#rules">
                                Правила проведения
                            </button>
                        </div>
                    </div>
                    <button class="purple-button header-slide-mobile-button" data-bs-toggle="modal" data-bs-target="#sendModal">
                        Получить консультацию
                    </button>
                </div>
            </div>
            <div class="swiper-slide" itemscope itemtype="http://schema.org/Service">
                <div class="header-slide header-slide-2 d-flex align-items-lg-center">
                    <div class="container">
                        <div class="d-lg-flex align-items-center">
                            <a href="/news/view?id=407" target="_blank">
                                <div class="header-slide-image d-lg-none">
                                    <img src="/img/header-slide-2.png" alt="img">
                                    <img class="header-slide-image-icon" src="/img/play-icon-solid.svg" alt="play">
                                </div>
                            </a>
                            <div class="header-slide-content">
                                <div class="header-slide-header">
                                    Коротко о главном
                                </div>
                                <div class="header-slide-text">
                                    Интервью председателя правления КПК “ТРЕСТ” Ремизова М.А. с Сергеем Соседовым. Обсудили важные вопросы о деятельности кооператива.
                                </div>
                                <a href="/news/view?id=407" target="_blank" class="purple-button d-none d-md-inline-block">
                                    Смотреть интервью
                                </a>
                            </div>
                            <a href="/news/view?id=407" target="_blank">
                                <div class="header-slide-image d-none d-lg-block">
                                    <img src="/img/header-slide-2.png" alt="img">
                                    <img class="header-slide-image-icon" src="/img/play-icon-solid.svg" alt="play">
                                </div>
                            </a>
                        </div>
                    </div>
                    <a href="/news/view?id=407" target="_blank" class="purple-button header-slide-mobile-button">
                        Смотреть интервью
                    </a>
                </div>
            </div>
            <div class="swiper-slide" itemscope itemtype="http://schema.org/Service">
                <div class="header-slide header-slide-3 d-flex align-items-lg-center">
                    <div class="container">
                        <div class="d-lg-flex align-items-center">
                            <div class="header-slide-image d-lg-none">
                                <?= file_get_contents(Yii::getAlias('@file/img/header-slide-mobile-3.svg')) ?>
                            </div>
                            <div class="header-slide-content">
                                <div class="header-slide-header">
                                    Материнский капитал
                                </div>
                                <div class="header-slide-text">
                                    Купите себе жилье за счет государства, не дожидаясь 3-х лет ребенку!
                                </div>
                                <button class="white-button d-none d-md-inline-block" data-bs-toggle="modal" data-bs-target="#sendModal">
                                    Заказать звонок
                                </button>
                            </div>
                        </div>
                    </div>
                    <button class="white-button header-slide-mobile-button" data-bs-toggle="modal" data-bs-target="#sendModal">
                        Заказать звонок
                    </button>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>

<section class="finance">
    <div class="container d-none d-lg-block">
        <div class="row justify-content-between">
            <div class="col-xl-3 col-lg-6">
                <a href="/msk" itemprop="url">
                    <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                        <div class="text-center">
                            <meta itemprop="serviceType" content='Займ' />
                            <span itemprop="name" class="finance-item-text">Займ по программе<br>
                                “Материнский капитал”
                            </span>
                        </div>
                        <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                            <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                            <link itemprop="url" href="https://trest24.ru/"/>
                            <meta itemprop="telephone" content="8 800 600-50-09">
                            <meta itemprop="email" content="info@trest24.ru">
                            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                <meta itemprop="addressLocality" content="Москва">
                                <meta itemprop="streetAddress" content="Красная Пресня 29">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-6">
                <a href="/rsk" itemprop="url">
                    <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                        <div class="text-center">
                            <meta itemprop="serviceType" content='Займ' />
                            <span itemprop="name" class="finance-item-text">
                                Займ по программе <br>
                                “Региональный капитал”
                            </span>
                        </div>
                        <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                            <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                            <link itemprop="url" href="https://trest24.ru/"/>
                            <meta itemprop="telephone" content="8 800 600-50-09">
                            <meta itemprop="email" content="info@trest24.ru">
                            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                <meta itemprop="addressLocality" content="Москва">
                                <meta itemprop="streetAddress" content="Красная Пресня 29">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-6 mt-lg-4 mt-xl-0">
                <a href="/estate" itemprop="url">
                    <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                        <div class="text-center">
                            <meta itemprop="serviceType" content='Займ' />
                            <span itemprop="name" class="finance-item-text">
                                Займ под залог <br>
                                недвижимости
                            </span>
                        </div>
                        <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                            <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                            <link itemprop="url" href="https://trest24.ru/"/>
                            <meta itemprop="telephone" content="8 800 600-50-09">
                            <meta itemprop="email" content="info@trest24.ru">
                            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                <meta itemprop="addressLocality" content="Москва">
                                <meta itemprop="streetAddress" content="Красная Пресня 29">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-6 mt-lg-4 mt-xl-0">
                <a href="/consumer" itemprop="url">
                    <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                        <div class="text-center">
                            <meta itemprop="serviceType" content='Займ' />
                            <span itemprop="name" class="finance-item-text">
                                Займ <br>потребительский
                            </span>
                        </div>
                        <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                            <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                            <link itemprop="url" href="https://trest24.ru/"/>
                            <meta itemprop="telephone" content="8 800 600-50-09">
                            <meta itemprop="email" content="info@trest24.ru">
                            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                <meta itemprop="addressLocality" content="Москва">
                                <meta itemprop="streetAddress" content="Красная Пресня 29">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row justify-content-between mt-4">
            <div class="col-xl-3 col-lg-6">
                <a href="/deposit" itemprop="url">
                    <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                        <div class="text-center">
                            <meta itemprop="serviceType" content='Сбережения' />
                            <span itemprop="name" class="finance-item-text">
                                Сберегательная программа<br>“Промо”
                            </span>
                        </div>
                        <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                            <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                            <link itemprop="url" href="https://trest24.ru/"/>
                            <meta itemprop="telephone" content="8 800 600-50-09">
                            <meta itemprop="email" content="info@trest24.ru">
                            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                <meta itemprop="addressLocality" content="Москва">
                                <meta itemprop="streetAddress" content="Красная Пресня 29">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-6">
                <a href="/deposit" itemprop="url">
                    <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                        <div class="text-center">
                            <meta itemprop="serviceType" content='Сбережения' />
                            <span itemprop="name" class="finance-item-text">
                                Сберегательная программа<br>“Легкий старт”
                            </span>
                        </div>
                        <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                            <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                            <link itemprop="url" href="https://trest24.ru/"/>
                            <meta itemprop="telephone" content="8 800 600-50-09">
                            <meta itemprop="email" content="info@trest24.ru">
                            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                <meta itemprop="addressLocality" content="Москва">
                                <meta itemprop="streetAddress" content="Красная Пресня 29">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-6 mt-lg-4 mt-xl-0">
                <a href="/deposit" itemprop="url">
                    <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                        <div class="text-center">
                            <meta itemprop="serviceType" content='Сбережения' />
                            <span itemprop="name" class="finance-item-text">
                                Сберегательная программа<br>“Стабильный доход”
                            </span>
                        </div>
                        <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                            <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                            <link itemprop="url" href="https://trest24.ru/"/>
                            <meta itemprop="telephone" content="8 800 600-50-09">
                            <meta itemprop="email" content="info@trest24.ru">
                            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                <meta itemprop="addressLocality" content="Москва">
                                <meta itemprop="streetAddress" content="Красная Пресня 29">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-6 mt-lg-4 mt-xl-0">
                <a href="/deposit" itemprop="url">
                    <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                        <div class="text-center">
                            <meta itemprop="serviceType" content='Сбережения' />
                            <span itemprop="name" class="finance-item-text">
                                Сберегательная программа<br>“Максимальный доход”
                            </span>
                        </div>
                        <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                            <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                            <link itemprop="url" href="https://trest24.ru/"/>
                            <meta itemprop="telephone" content="8 800 600-50-09">
                            <meta itemprop="email" content="info@trest24.ru">
                            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                <meta itemprop="addressLocality" content="Москва">
                                <meta itemprop="streetAddress" content="Красная Пресня 29">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="container d-lg-none text-center">
        <div class="finance-slider swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="mt-4 mx-1">
                        <a href="/msk" itemprop="url">
                            <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                                <div class="text-center">
                                    <meta itemprop="serviceType" content='Займ' />
                                    <span itemprop="name" class="finance-item-text">
                                        Займ по программе<br>
                                        “Материнский капитал”
                                    </span>
                                </div>
                                <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                                    <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                                    <link itemprop="url" href="https://trest24.ru/"/>
                                    <meta itemprop="telephone" content="8 800 600-50-09">
                                    <meta itemprop="email" content="info@trest24.ru">
                                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                        <meta itemprop="addressLocality" content="Москва">
                                        <meta itemprop="streetAddress" content="Красная Пресня 29">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mt-4 mx-1">
                        <a href="/rsk" itemprop="url">
                            <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                                <div class="text-center">
                                    <meta itemprop="serviceType" content='Займ' />
                                    <span itemprop="name" class="finance-item-text">
                                        Займ по программе <br>
                                        “Региональный капитал”
                                    </span>
                                </div>
                                <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                                    <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                                    <link itemprop="url" href="https://trest24.ru/"/>
                                    <meta itemprop="telephone" content="8 800 600-50-09">
                                    <meta itemprop="email" content="info@trest24.ru">
                                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                        <meta itemprop="addressLocality" content="Москва">
                                        <meta itemprop="streetAddress" content="Красная Пресня 29">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mt-4 mx-1">
                        <a href="/estate" itemprop="url">
                            <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                                <div class="text-center">
                                    <meta itemprop="serviceType" content='Займ' />
                                    <span itemprop="name" class="finance-item-text">
                                        Займ под залог <br>
                                        недвижимости
                                    </span>
                                </div>
                                <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                                    <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                                    <link itemprop="url" href="https://trest24.ru/"/>
                                    <meta itemprop="telephone" content="8 800 600-50-09">
                                    <meta itemprop="email" content="info@trest24.ru">
                                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                        <meta itemprop="addressLocality" content="Москва">
                                        <meta itemprop="streetAddress" content="Красная Пресня 29">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="my-4 mx-1">
                        <a href="/consumer" itemprop="url">
                            <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                                <div class="text-center">
                                    <meta itemprop="serviceType" content='Займ' />
                                    <span itemprop="name" class="finance-item-text">
                                        Займ <br>потребительский
                                    </span>
                                </div>
                                <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                                    <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                                    <link itemprop="url" href="https://trest24.ru/"/>
                                    <meta itemprop="telephone" content="8 800 600-50-09">
                                    <meta itemprop="email" content="info@trest24.ru">
                                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                        <meta itemprop="addressLocality" content="Москва">
                                        <meta itemprop="streetAddress" content="Красная Пресня 29">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="mt-4 mx-1">
                        <a href="/deposit" itemprop="url">
                            <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                                <div class="text-center">
                                    <meta itemprop="serviceType" content='Сбережения' />
                                    <span itemprop="name" class="finance-item-text">
                                        Сберегательная программа<br>“Промо”
                                    </span>
                                </div>
                                <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                                    <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                                    <link itemprop="url" href="https://trest24.ru/"/>
                                    <meta itemprop="telephone" content="8 800 600-50-09">
                                    <meta itemprop="email" content="info@trest24.ru">
                                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                        <meta itemprop="addressLocality" content="Москва">
                                        <meta itemprop="streetAddress" content="Красная Пресня 29">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mt-4 mx-1">
                        <a href="/deposit" itemprop="url">
                            <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                                <div class="text-center">
                                    <meta itemprop="serviceType" content='Сбережения' />
                                    <span itemprop="name" class="finance-item-text">
                                        Сберегательная программа<br>“Легкий старт”
                                    </span>
                                </div>
                                <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                                    <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                                    <link itemprop="url" href="https://trest24.ru/"/>
                                    <meta itemprop="telephone" content="8 800 600-50-09">
                                    <meta itemprop="email" content="info@trest24.ru">
                                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                        <meta itemprop="addressLocality" content="Москва">
                                        <meta itemprop="streetAddress" content="Красная Пресня 29">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mt-4 mx-1">
                        <a href="/deposit" itemprop="url">
                            <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                                <div class="text-center">
                                    <meta itemprop="serviceType" content='Сбережения' />
                                    <span itemprop="name" class="finance-item-text">
                                        Сберегательная программа<br>“Стабильный доход”
                                    </span>
                                </div>
                                <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                                    <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                                    <link itemprop="url" href="https://trest24.ru/"/>
                                    <meta itemprop="telephone" content="8 800 600-50-09">
                                    <meta itemprop="email" content="info@trest24.ru">
                                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                        <meta itemprop="addressLocality" content="Москва">
                                        <meta itemprop="streetAddress" content="Красная Пресня 29">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="my-4 mx-1">
                        <a href="/deposit" itemprop="url">
                            <div class="finance-item" itemscope itemtype="http://schema.org/Service">
                                <div class="text-center">
                                    <meta itemprop="serviceType" content='Сбережения' />
                                    <span itemprop="name" class="finance-item-text">
                                        Сберегательная программа<br>“Максимальный доход”
                                    </span>
                                </div>
                                <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                                    <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
                                    <link itemprop="url" href="https://trest24.ru/"/>
                                    <meta itemprop="telephone" content="8 800 600-50-09">
                                    <meta itemprop="email" content="info@trest24.ru">
                                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                        <meta itemprop="addressLocality" content="Москва">
                                        <meta itemprop="streetAddress" content="Красная Пресня 29">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <button class="purple-button d-lg-none" data-bs-toggle="modal" data-bs-target="#sendModal">
            Получить консультацию
        </button>
    </div>
</section>

<section class="mission-index">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-6">
                <img class="mission-index-image" src="/img/director.webp" alt="dir">
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="mission-index-description">
                    <div class="d-lg-none mission-index-header">
                        Создавая лучший сервис, мы помогаем
                        хорошим людям осуществлять их планы и мечты,
                        поддерживая их финансово.
                    </div>
                    <div class="d-none d-lg-block mission-index-header">
                        Создавая лучший сервис, мы помогаем<br>
                        хорошим людям осуществлять их планы и мечты,<br>
                        поддерживая их финансово.
                    </div>
                    <div class="mission-index-content d-flex align-items-center">
                        <div>
                            <b>Ремизов Максим Анатольевич</b><br>
                            Председатель правления КПК “ТРЕСТ”
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="info">
    <div class="container">
        <div class="info-wrapper d-lg-flex justify-content-between">
            <div class="info-wrap-1">
                <div class="info-item d-flex align-items-center">
                    <div class="info-item-icon">
                        <img src="/img/index-1.webp" alt="check">
                    </div>
                    <div class="info-item-text">
                        Состоим в государственном реестре кредитных кооперативов ЦБ РФ
                    </div>
                </div>
                <div class="info-item d-flex align-items-center">
                    <div class="info-item-icon">
                        <img src="/img/index-2.webp" alt="check">
                    </div>
                    <div class="info-item-text">
                        Член Ассоциации «Национальное содружество кредитных кооперативов «Содействие», запись
                        № СЗ-0242 от 26.11.2020 г
                    </div>
                </div>
                <div class="info-item d-flex align-items-center">
                    <div class="info-item-icon">
                        <img src="/img/index-3.webp" alt="check">
                    </div>
                    <div class="info-item-text">
                        Всё абсолютно законно, без каких-либо рисков
                    </div>
                </div>
            </div>
            <div class="info-wrap-2">
                <div class="info-item d-flex align-items-center">
                    <div class="info-item-icon">
                        <img src="/img/index-4.webp" alt="check">
                    </div>
                    <div class="info-item-text">
                        Поможем собрать Вам весь пакет документов
                    </div>
                </div>
                <div class="info-item d-flex align-items-center">
                    <div class="info-item-icon">
                        <img src="/img/index-5.webp" alt="check">
                    </div>
                    <div class="info-item-text">
                        Широкий выбор программ, что позволяет подобрать
                        наиболее выгодную и подходящую для Вас
                    </div>
                </div>
                <div class="info-item d-flex align-items-center">
                    <div class="info-item-icon">
                        <img src="/img/index-6.webp" alt="check">
                    </div>
                    <div class="info-item-text">
                        Деньги зачисляются заемщику за ОДИН рабочий день
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="news-index">
    <div class="container">
        <div class="text-center">
            <a href="/news" class="news-index-title">
                Последние новости
            </a>
        </div>
        <div class="d-lg-none">
            <div class="news-slider swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php foreach ($news as $item): ?>
                    <div class="swiper-slide">
                        <div class="block-news" itemscope itemtype="http://schema.org/Article">
                            <meta itemprop="publisher" content="Кредитный потребительский кооператив «ТРЕСТ»"/>
                            <div class="block-news__img">
                                <?php if (!empty($images[$item->id]) && !empty($item->id)) { ?>
                                    <a href="<?= '/news/view?id='.$item->id ?>" itemprop="url">
                                        <img src="<?= $images[$item->id] ?>" alt="news-icon" itemprop="image">
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="block-news__text">
                                <a href="<?= '/news/view?id='.$item->id ?>" itemprop="url">
                                    <span itemprop="headline">
                                        <?= $item->title ?>
                                    </span>
                                    <meta itemprop="description" content="<?= $item->title ?>"/>
                                </a>
                            </div>
                            <div class="block-news__date">
                                <time itemprop="datePublished" datetime="<?= (new DateTime($item->DateSite))->format('Y-m-d') ?>">
                                    <small>
                                        <?= $item->DateSite ?>
                                    </small>
                                </time>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="d-none d-lg-block">
            <div class="d-flex justify-content-center">
                <?php foreach ($news as $item): ?>
                    <div class="block-news">
                        <meta itemprop="publisher" content="Кредитный потребительский кооператив «ТРЕСТ»"/>
                        <?php if (!empty($images[$item->id]) && !empty($item->id)) { ?>
                            <div class="block-news__img">
                                <a href="<?= '/news/view?id='.$item->id ?>" itemprop="url">
                                    <img src="<?= $images[$item->id] ?>" alt="news-icon" itemprop="image">
                                </a>
                            </div>
                        <?php } ?>
                        <div class="block-news__text">
                            <a href="<?= '/news/view?id='.$item->id ?>" itemprop="url">
                                <span itemprop="headline">
                                    <?= $item->title ?>
                                </span>
                                <meta itemprop="description" content="<?= $item->title ?>"/>
                            </a>
                        </div>
                        <div class="block-news__date">
                            <time itemprop="datePublished" datetime="<?= (new DateTime($item->DateSite))->format('Y-m-d') ?>">
                                <small>
                                    <?= $item->DateSite ?>
                                </small>
                            </time>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<section class="form-phone-index">
    <div class="container">
        <div class="form-phone-index-wrapper">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="form-phone-index__title">
                            <h2>Оставьте заявку</h2>
                            <h3>на бесплатную консультацию</h3>
                        </div>
                        <div class="form-phone-index__form">
                            <div class="form-submission">
                                <div class="form-group-site">
                                    <label for="">Имя:</label>
                                    <input class="form-control-input" name="name" type="text">
                                </div>
                                <div class="form-group-site">
                                    <label for="">Телефон:</label>
                                    <input class="form-control-input" name="phone" type="text" placeholder="+7 (___) ___-__-__">
                                </div>
                                <a class="purple-button" data-action="send" data-visible="true">
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
                    <div class="col-md-12 col-lg-6 d-none d-lg-block">
                        <img src="/img/woman.png" alt="woman">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include Yii::getAlias('@app') . '/views/site/blocks/footer.php' ?>