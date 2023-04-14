<?php include Yii::getAlias('@app').'/views/site/blocks/menuIndex.php' ?>
<div itemscope itemtype="http://schema.org/Service">
    <section class="savings-banner d-flex flex-column justify-content-center">
        <div class="container">
            <div class="savings-banner-content">
                <div class="savings-banner-header">
                    Сберегательные программы
                </div>
                <div class="savings-banner-text">
                    Отличная репутация компании, профессиональная команда, — делают<br>
                    Ваши вложения в ТРЕСТ лучшим стратегическим решением для<br>
                    сохранения и приумножения сбережений!
                </div>
                <button class="white-button" data-bs-toggle="modal" data-bs-target="#sendModalDeposit">
                    Начать копить
                </button>
                <img class="d-md-none savings-banner-image" src="/img/savings-banner-mobile.webp" alt="savings" />
            </div>
        </div>
    </section>
    <section class="savings-head">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-12 col-xl-6">
                    <img class="savings-head-image" src="/img/savings-head.webp" alt="savings-head">
                </div>
                <div class="col-lg-12 col-xl-6">
                    <div class="savings-head-description">
                        <div class="d-xl-none savings-head-header">
                            Финансовое планирование на сегодняшний день является одним из важных аспектов в жизни каждого человека.
                            Моя задача как эксперта в данной области помочь нашим сберегателям составить личный финансовый план,
                            который в перспективе поможет в осуществлении целей наших пайщиков и удовлетворении их потребностей.
                            Поэтому для меня и моей команды важно, чтобы нам доверяли, и для этого мы приложим все возможные
                            усилия и применим все наши профессиональные качества. Мы - за долгосрочное и взаимовыгодное сотрудничество.
                        </div>
                        <div class="d-none d-xl-block savings-head-header">
                            Финансовое планирование на сегодняшний день<br>
                            является одним из важных аспектов в жизни каждого<br>
                            человека. Моя задача как эксперта в данной области<br>
                            помочь нашим сберегателям составить личный<br>
                            финансовый план, который в перспективе поможет<br>
                            в осуществлении целей наших пайщиков<br>
                            и удовлетворении их потребностей.<br>
                            Поэтому для меня и моей команды важно, чтобы нам<br>
                            доверяли, и для этого мы приложим все возможные<br>
                            усилия и применим все наши профессиональные<br>
                            качества. Мы - за долгосрочное и взаимовыгодное<br>
                            сотрудничество.
                        </div>
                        <div class="savings-head-content d-flex align-items-end">
                            <div>
                                <b>Макаренко Валерий Викторович</b><br>
                                Руководитель отдела сбережений
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="savings-services">
        <div class="container">
            <div class="savings-services-wrapper">
                <div class="savings-services-slider swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="savings-services-item d-flex align-items-center">
                                <div class="savings-services-item-icon">
                                    <?= file_get_contents(Yii::getAlias('@file/img/savings-services-1.svg')) ?>
                                </div>
                                <div class="savings-services-item-text">
                                    Доходность
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="savings-services-item d-flex align-items-center">
                                <div class="savings-services-item-icon">
                                    <?= file_get_contents(Yii::getAlias('@file/img/savings-services-2.svg')) ?>
                                </div>
                                <div class="savings-services-item-text">
                                    Сохранность
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="savings-services-item d-flex align-items-center">
                                <div class="savings-services-item-icon">
                                    <?= file_get_contents(Yii::getAlias('@file/img/savings-services-3.svg')) ?>
                                </div>
                                <div class="savings-services-item-text">
                                    Сопровождение
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="savings-services-item d-flex align-items-center">
                                <div class="savings-services-item-icon">
                                    <?= file_get_contents(Yii::getAlias('@file/img/savings-services-4.svg')) ?>
                                </div>
                                <div class="savings-services-item-text">
                                    Удобство
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="block-table-tariff">
        <div class="container">
            <h2 class="h1 text-center">
                Сберегательные программы
            </h2>
            <div class="block-table-tariff-slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($tariffs as $tariff) { ?>
                        <div class="swiper-slide">
                            <?= \app\widgets\TableTariff::widget(['table' => $tariff]) ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-pagination d-lg-none"></div>
            </div>
        </div>
    </section>
    <section class="attachment-calculator-wrapper">
        <div class="container">
            <div class="attachment-calculator-wrapper__title">
                <h2 class="h1 text-center mb-3">
                    Калькулятор сбережений
                </h2>
                <p class="text-center ">
                    Рассчитайте доходность ваших сбережений
                </p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div id="attachment-calculator" data-info='<?= $calc_info ?>'></div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img class="img-max" src="/img/calc.webp" alt="calc-picture">
                </div>
            </div>
        </div>
    </section>
    <section class="savings-save">
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="h1">
                    СОХРАННОСТЬ СБЕРЕЖЕНИЙ
                </h1>
                <div class="savings-save-text">
                    Непосредственный надзор Центрального банка Российской Федерации и соблюдение всех необходимых
                    финансовых нормативов – делает вложения денежных средств в Кооператив безопасными.
                </div>
            </div>
        </div>
    </section>
    <section class="bg-slash">
        <div>
            <div class="container">
                <h1 class="h1 text-center">
                    Дополнительные уровни безопасности
                </h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="block-icon-left">
                            <div class="block-icon-left__icon">
                                <img src="/img/yellow-shield.webp" alt="yellow-shield">
                            </div>
                            <div class="block-icon-left__content">
                                В соответствии с Положением о выдаче займов и финансовой стратегией Кооператива,
                                денежные средства, распределяемые на выдачу займов, выдаются только на займы
                                с высоким уровнем обеспечения: «Займы под залог недвижимости», «Займы на покупку жилья»,
                                «Займы под поручительство третьих лиц» - что является гарантией возврата займов
                                и соответственно сохранности сбережений.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="block-icon-left">
                            <div class="block-icon-left__icon"><img src="/img/yellow-shield.webp" alt="yellow-shield"></div>
                            <div class="block-icon-left__content">
                                Профессиональная команда Кооператива, включающая в себя председателя правления,
                                заместителей и руководителей ключевых подразделений, имеет опыт работы в финансовом
                                секторе более 15 лет, что позволяет осуществлять стабильную и эффективную работу
                                Кооператива и соответственно гарантировать сохранность и возвратность вложенных
                                сбережений вместе с процентами.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="block-icon-left">
                            <div class="block-icon-left__icon">
                                <img src="/img/yellow-shield.webp" alt="yellow-shield">
                            </div>
                            <div class="block-icon-left__content">
                                Собственный резервный фонд Кооператива, денежные средства которого могут быть
                                использованы только для обеспечения непредвиденных расходов и возврата сбережений
                                пайщикам.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="block-icon-left">
                            <div class="block-icon-left__icon">
                                <img src="/img/yellow-shield.webp" alt="yellow-shield">
                            </div>
                            <div class="block-icon-left__content">
                                Установленные отчисления Кооператива в Компенсационный фонд Саморегулируемой
                                организации, являются аналогией системе страхования банковских вкладов АСВ.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center d-none d-lg-block">
                    <div class="mt-5 text-center">
                        <a class="btn-while" data-bs-toggle="modal" data-bs-target="#sendModal">
                            Позвоните мне
                        </a>
                    </div>
                </div>
                <div class="d-lg-none">
                    <div class="form-wrapper form-wrapper--center">
                        <div class="form-submission">
                            <div class="form-group-site">
                                <label class="text-white" for="">Имя:</label>
                                <input class="form-control-input" name="name" type="text">
                            </div>
                            <div class="form-group-site">
                                <label class="text-white" for="">Телефон:</label>
                                <input class="form-control-input" name="phone" type="text" placeholder="+7 (___) ___-__-__">
                            </div>
                            <a class="btn-while" data-action="send" data-visible="true">Оставить заявку</a>
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
</div>
<?php include Yii::getAlias('@app') . '/views/site/blocks/footer.php' ?>









