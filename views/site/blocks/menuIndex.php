<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>

<aside class="mobile-nav" itemscope itemtype="http://schema.org/SiteNavigationElement">
    <ul class="mobile-nav__menu" itemscope itemtype="http://schema.org/ItemList">
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <span itemprop="name">
                О Трест
            </span>
            <ul itemscope itemtype="http://schema.org/ItemList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?= Url::current() !== '/about' ? Html::a('Информация о ТРЕСТ', '/about', ['itemprop' => 'url']) : Html::tag('span','Информация о ТРЕСТ') ?>
                    <meta itemprop="name" content="Информация о ТРЕСТ" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?= Url::current() !== '/doc' ? Html::a('Управляющие документы', '/doc', ['itemprop' => 'url']) : Html::tag('span','Управляющие документы') ?>
                    <meta itemprop="name" content="Управляющие документы" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?= Url::current() !== '/requisites' ? Html::a('Реквизиты', '/requisites', ['itemprop' => 'url']) : Html::tag('span','Реквизиты') ?>
                    <meta itemprop="name" content="Реквизиты" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?= Url::current() !== '/news/index' ? Html::a('Новости', '/news', ['itemprop' => 'url']) : Html::tag('span','Новости') ?>
                    <meta itemprop="name" content="Новости" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?= Url::current() !== '/mission' ? Html::a('Наша миссия', '/mission', ['itemprop' => 'url']) : Html::tag('span','Наша миссия') ?>
                    <meta itemprop="name" content="Наша миссия" />
                </li>
            </ul>
        </li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <span itemprop="name">
                Займы
            </span>
            <ul itemscope itemtype="http://schema.org/ItemList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?= Url::current() !== '/zaym/materinskii-kapital' ? Html::a('Материнский капитал', '/zaym/materinskii-kapital', ['itemprop' => 'url']) : Html::tag('span','Материнский капитал') ?>
                    <meta itemprop="name" content="Материнский капитал" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?= Url::current() !== '/zaym/semeynii-kapital' ? Html::a('Региональный семейный капитал', '/zaym/semeynii-kapital', ['itemprop' => 'url']) : Html::tag('span','Региональный семейный капитал') ?>
                    <meta itemprop="name" content="Региональный семейный капитал" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?= Url::current() !== '/zaym/pod-zalog-nedvizhimosti' ? Html::a('Под залог недвижимости', '/zaym/pod-zalog-nedvizhimosti', ['itemprop' => 'url']) : Html::tag('span','Под залог недвижимости') ?>
                    <meta itemprop="name" content="Под залог недвижимости" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?= Url::current() !== '/zaym/potreb-kredit' ? Html::a('Потребительский', '/zaym/potreb-kredit', ['itemprop' => 'url']) : Html::tag('span','Потребительский') ?>
                    <meta itemprop="name" content="Потребительский" />
                </li>
            </ul>
        </li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <?= Url::current() !== '/deposit' ? Html::a('Сбережения', '/deposit', ['itemprop' => 'url']) : Html::tag('span','Сбережения') ?>
            <meta itemprop="name" content="Сбережения" />
        </li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <span itemprop="name">
                Контакты
            </span>
            <ul itemscope itemtype="http://schema.org/ItemList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?= Url::current() !== '/contacts' ? Html::a('Главный офис', '/contacts', ['itemprop' => 'url']) : Html::tag('span','Главный офис') ?>
                    <meta itemprop="name" content="Главный офис" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?= Url::current() !== '/dir' ? Html::a('Обратиться к руководителю', '/dir', ['itemprop' => 'url']) : Html::tag('span','Обратиться к руководителю') ?>
                    <meta itemprop="name" content="Обратиться к руководителю" />
                </li>
            </ul>
        </li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <?= Url::current() !== '/reviews/index' ? Html::a('Отзывы', '/reviews', ['itemprop' => 'url']) : Html::tag('span','Отзывы') ?>
            <meta itemprop="name" content="Отзывы" />
        </li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <?= Url::current() !== '/gallery/index' ? Html::a('Фотогалерея', '/gallery', ['itemprop' => 'url']) : Html::tag('span','Фотогалерея') ?>
            <meta itemprop="name" content="Фотогалерея" />
        </li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <?= Html::a('Личный кабинет', 'https://lk.kooperatiff.ru', ['itemprop' => 'url']) ?>
            <meta itemprop="name" content="Личный кабинет" />
        </li>
    </ul>
</aside>

<header class="header mb-0">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="header-logo">
            <?= Url::current() !== '/' ? Html::a(Html::img('/img/logo.svg', ['alt' => 'logo', 'itemprop' => 'image']), '/', ['itemprop' => 'url']) : Html::img('/img/logo.svg', ['alt' => 'logo', 'itemprop' => 'image']) ?>
        </div>
        <div class="nav__mobile-menu">
            <a href="#" class="onShowMobileMenu d-flex align-items-center">
                <div class="onShowMobileMenu__text">МЕНЮ</div> <img src="/img/menu-icon-black.webp" alt="mobile-menu-icon">
            </a>
        </div>
        <div class="header-nav" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <ul class="nav__menu" itemscope itemtype="http://schema.org/ItemList">
                <li class="header-nav-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <span itemprop="name">
                        О Трест
                    </span>
                    <ul itemscope itemtype="http://schema.org/ItemList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <?= Url::current() !== '/about' ? Html::a('Информация о ТРЕСТ', '/about', ['itemprop' => 'url']) : Html::tag('span','Информация о ТРЕСТ') ?>
                            <meta itemprop="name" content="Информация о ТРЕСТ" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <?= Url::current() !== '/doc' ? Html::a('Управляющие документы', '/doc', ['itemprop' => 'url']) : Html::tag('span','Управляющие документы') ?>
                            <meta itemprop="name" content="Управляющие документы" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <?= Url::current() !== '/requisites' ? Html::a('Реквизиты', '/requisites', ['itemprop' => 'url']) : Html::tag('span','Реквизиты') ?>
                            <meta itemprop="name" content="Реквизиты" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <?= Url::current() !== '/news/index' ? Html::a('Новости', '/news', ['itemprop' => 'url']) : Html::tag('span','Новости') ?>
                            <meta itemprop="name" content="Новости" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <?= Url::current() !== '/mission' ? Html::a('Наша миссия', '/mission', ['style' => ['font-weight' => 'bolder', 'color' => '#ffd14a'], 'itemprop' => 'url']) : Html::tag('span','Наша миссия', ['style' => ['font-weight' => 'bolder', 'color' => '#ffd14a']]) ?>
                            <meta itemprop="name" content="Наша миссия" />
                        </li>
                    </ul>
                </li>
                <li class="header-nav-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <span itemprop="name">
                        Займы
                    </span>
                    <ul itemscope itemtype="http://schema.org/ItemList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <?= Url::current() !== '/zaym/materinskii-kapital' ? Html::a('Материнский капитал', '/zaym/materinskii-kapital', ['itemprop' => 'url']) : Html::tag('span','Материнский капитал') ?>
                            <meta itemprop="name" content="Материнский капитал" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <?= Url::current() !== '/zaym/semeynii-kapital' ? Html::a('Региональный семейный капитал', '/zaym/semeynii-kapital', ['itemprop' => 'url']) : Html::tag('span','Региональный семейный капитал') ?>
                            <meta itemprop="name" content="Региональный семейный капитал" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <?= Url::current() !== '/zaym/pod-zalog-nedvizhimosti' ? Html::a('Под залог недвижимости', '/zaym/pod-zalog-nedvizhimosti', ['itemprop' => 'url']) : Html::tag('span','Под залог недвижимости') ?>
                            <meta itemprop="name" content="Под залог недвижимости" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <?= Url::current() !== '/zaym/potreb-kredit' ? Html::a('Потребительский', '/zaym/potreb-kredit', ['itemprop' => 'url']) : Html::tag('span','Потребительский') ?>
                            <meta itemprop="name" content="Потребительский" />
                        </li>
                    </ul>
                </li>
                <li class="header-nav-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?= Url::current() !== '/deposit/index' ? Html::a('Сбережения', '/deposit', ['itemprop' => 'url']) : Html::tag('span','Сбережения', ['class' => 'active']) ?>
                    <meta itemprop="name" content="Сбережения" />
                </li>
                <li class="header-nav-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <span itemprop="name">
                        Контакты
                    </span>
                    <ul itemscope itemtype="http://schema.org/ItemList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <?= Url::current() !== '/contacts' ? Html::a('Главный офис', '/contacts', ['itemprop' => 'url']) : Html::tag('span','Главный офис') ?>
                            <meta itemprop="name" content="Главный офис" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <?= Url::current() !== '/dir' ? Html::a('Обратиться к руководителю', '/dir', ['itemprop' => 'url']) : Html::tag('span','Обратиться к руководителю') ?>
                            <meta itemprop="name" content="Обратиться к руководителю" />
                        </li>
                    </ul>
                </li>
                <li class="header-nav-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?= Url::current() !== '/reviews/index' ? Html::a('Отзывы', '/reviews', ['itemprop' => 'url']) : Html::tag('span','Отзывы') ?>
                    <meta itemprop="name" content="Отзывы" />
                </li>
                <li class="header-nav-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?= Url::current() !== '/gallery/index' ? Html::a('Фотогалерея', '/gallery', ['itemprop' => 'url']) : Html::tag('span','Фотогалерея', ['class' => 'active']) ?>
                    <meta itemprop="name" content="Фотогалерея" />
                </li>
                <li class="header-nav-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?= Html::a('Личный кабинет', 'https://lk.kooperatiff.ru', ['itemprop' => 'url']) ?>
                    <meta itemprop="name" content="Личный кабинет" />
                </li>
            </ul>
        </div>
    </div>
</header>

<?php include Yii::getAlias('@app') . '/views/site/blocks/modals.php' ?>