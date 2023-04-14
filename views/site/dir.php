<?php include Yii::getAlias('@app').'/views/site/blocks/menu.php' ?>
<section class="dir mb-desktop">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="h1 mb-5">
                    <?= $this->title ?>
                </h1>
                <p>
                    <strong>
                        Уважаемые посетители!
                    </strong>
                </p>
                <p>
                    Вы можете отправить обращение к председателю правления кооператива по любым вопросам,
                    касающимся деятельности кооператива: задать вопрос, обратиться с жалобой, просьбой,
                    предложением, пожеланием.
                    <br>
                    <br>
                    Ваше обращение будет немедленно отправлено на личную электронную почту председателя
                    правления кооператива и рассмотрено в течение суток.
                    <br>
                    <br>
                    В течение трех рабочих дней Вам буден дан ответ в устной или письменной форме.
                </p>
                <div class="dir-button btn-purple my-5" data-bs-toggle="modal" data-bs-target="#sendModalDir">
                    Написать письмо
                </div>
            </div>
            <div class="col-lg-6">
                <img src="/img/img23asd.webp" alt="callback-picture" class="img-max">
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