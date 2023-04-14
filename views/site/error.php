<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

if (Yii::$app->errorHandler->exception->statusCode === 404) {
    $this->title = 'Ошибка 404';
} else {
    $this->title = $name;
}

?>

<?php if (Yii::$app->errorHandler->exception->statusCode === 404) { ?>
    <section class="site-error">
        <div class="container">
            <div class="row site-error-wrapper">
                <div class="col-12 site-error-header">
                    <a href="/" class="site-error-header-logo">
                        <?= file_get_contents(Yii::getAlias('@file/img/404-logo.svg')) ?>
                    </a>
                    <div class="site-error-header-text">
                        Кредитный потребительский кооператив «ТРЕСТ»
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 site-error-content">
                    <h1 class="site-error-content-title">
                        Ошибка 404
                    </h1>
                    <div class="site-error-content-text">
                        <div>
                            Страница, на которую Вы попали, не существует.<br>
                            Вы можете попробовать следующее:
                        </div>
                        <ul class="site-error-content-list">
                            <li class="site-error-content-list-item">
                                Очистите кэш Вашего браузера и перезагрузите страницу
                            </li>
                            <li class="site-error-content-list-item">
                                Перейти к главной странице сайта
                            </li>
                            <li class="site-error-content-list-item">
                                Проверить правильность введенного адреса
                            </li>
                            <li class="site-error-content-list-item">
                                Нажать кнопку “Назад” в своем браузере
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 site-error-image">
                    <img src="/img/404.webp" alt="mobile">
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <h1>
        <?= Html::encode($this->title) ?>
    </h1>
    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
<?php } ?>