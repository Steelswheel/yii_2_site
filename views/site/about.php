<?php
    include Yii::getAlias('@app').'/views/site/blocks/menu.php';

    $value = \app\models\Settings::field('about','info-top', []);
?>

<div class="about block-dotted-line container">
    <h1 class="h1">
        <?= $value['title'] ?>
    </h1>

    <div class="row">
        <div class="col-lg-8 order-1">
            <div class="list-yellow-shield mb-4">
                Кооператив осуществляет свою деятельность в соответствии с нормами Гражданского кодекса
                Российской Федерации, на основании Федерального закона «О кредитной кооперации» № 190-ФЗ
                от 18.07.2009 г., нормативными актами Банка России, стандартами и правилами СРО, Уставом,
                положениями и внутренними нормативными документами.
            </div>
            <div class="list-yellow-shield mt-4 mb-4">
                Кооператив состоит в Государственном реестре кредитных потребительских кооперативов
                Центрального банка Российской Федерации.
            </div>
            <div class="list-yellow-shield mt-4 mb-4">
                Кооператив состоит в реестре Ассоциации "Саморегулируемая организация "Национальное
                объединение кредитных кооперативов", о чем внесена запись за №6, от 29.09.2022.
            </div>
            <div class="list-yellow-shield mt-4 mb-4">
                Надзор и контроль за деятельностью кооператива осуществляют надзорные органы: Центральный
                банк РФ, СРО, РосФинМониторинг.
            </div>
            <div class="list-yellow-shield mt-4 mb-4">
                Кооператив соблюдает финансовые нормативы, установленные Центральным банком РФ, такие как:
                ограничения по срокам выдачи займов, доле капитала, которую можно вкладывать в
                 государственные ценные бумаги, соотношению привлеченных средств и выданных займов
                и так далее, что позволяет соблюдать финансовую устойчивость в краткосрочной
                и долгосрочной перспективе.
            </div>
            <div class="list-yellow-shield mt-4 mb-4">
                В соответствии с Федеральным законом «О кредитной кооперации» № 190-ФЗ от 18.07.2009г
                Кооператив осуществляет формирование резервного фонда – своеобразная финансовая подушка
                безопасности. Эти деньги всегда остаются на расчетном счете организации. Средства резервного
                фонда могут использоваться только для обеспечения непредвиденных расходов и покрытия убытков
                кооператива.
            </div>
            <div class="list-yellow-shield mt-4 mb-4">
                Кооператив делает отчисления 0,2% от среднегодовых активов в Ассоциацию "Саморегулируемая
                организация "Национальное объединение кредитных кооперативов", из этих денег в СРО
                формируется компенсационный фонд, что является аналогом системе страхования банковских
                вкладов АСВ.
            </div>
            <div class="list-yellow-shield mt-4">
                <div>
                    В соответствии с уставом Кооператив осуществляет работу следующим образом:
                    <ol style="padding: 0.5rem 0 0 1rem; margin: 0">
                        <li>
                            Кооператив формирует фонды — аналог уставного капитала. За счет собственных
                            средств кооператива, паевых взносов, привлеченных сбережений.
                        </li>
                        <li>
                            Кооператив часть денежных средств из фондов выдает в виде займов, а часть
                            вкладывает в государственные ценные бумаги.
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-lg-4 order-2">
            <img class="img-max" src="/img/graphics.svg" alt="yellow-shield">
        </div>
    </div>
</div>

<section class="become-a-shareholder">
    <div class="container">
        <?php
        $value = \app\models\Settings::field('about','info-center',[]);
        include Yii::getAlias('@app') . "/views/site/construct/become-a-shareholder__center.php";

        $value = \app\models\Settings::field('about','info-bottom',[]);
        include Yii::getAlias('@app') . "/views/site/construct/block-purple.php";
        ?>

        <div class="three-in-a-row-text">
            <p class="">
                Заинтересовало? <br>
                Оставьте заявку и мы Вам позвоним!
            </p>
        </div>

        <div class="text-center d-none d-lg-block">
            <a  class="btn-while" data-bs-toggle="modal" data-bs-target="#sendModal">Оставить заявку</a>
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
                        <input class="form-control-input" name="phone" type="text" placeholder="+7 (___) ___-__-__">
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
</section>

<?php include Yii::getAlias('@app').'/views/site/blocks/footer.php' ?>