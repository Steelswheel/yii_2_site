<?php
namespace app\controllers;

use yii\helpers\Url;
use yii\web\Controller;
use yii\web\HttpException;

class ZaymController extends Controller
{
    public $layout = '@template/index';

    public function actionIndex()
    {
        $this->view->title = 'Оформить займ в кредитном потребительском кооперативе в Москве и других городах России';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'займ, кредит, кооператив, кпк, Москва'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Выгодные условия кредитования для заемщиков кпк ТРЕСТ в Москве и других городах России без привязки к кредитной истории. Рассмотрение заявки от 1 дня  '
        ]);

        throw new HttpException(404);
    }

    public function actionMaterinskiiKapital()
    {
        $this->view->title = 'Кредит под материнский капитал в КПК ТРЕСТ - Москва и другие города России';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'кредит, займ, маткапитал, материнский, капитал, Москва, строительство, квартира, дом'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Различные программы кредита с использованием Материнского Капитала от кооператива КПК ТРЕСТ. Оформление займа под материнский капитал на строительство дома, покупку квартиры в Москве и области'
        ]);

        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/zaym/materinskii-kapital'], true)
            ]
        );

        return $this->render('materinskii-kapital');
    }

    public function actionSemeyniiKapital()
    {
        $this->view->title = 'Кредит по программе Регионального семейного капитала в Москве и других городах России';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'кредит, займ, региональный, семейный, капитал, Москва, программа'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Выгодные условия кредитования по программе Регионального семейного капитала от КПК ТРЕСТ в городе Москва и других городах России. Подтверждение заявки от 1 дня.'
        ]);

        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/zaym/semeynii-kapital'], true)
            ]
        );

        return $this->render('semeynii-kapital');
    }

//    public function action450000()
//    {
//        $this->view->title = 'Кредит по программе господдержки 450000 рублей в Москве и других городах России';
//
//        $this->view->registerMetaTag([
//            'name' => 'keywords',
//            'content' => 'ипотечный, кредит, займ, госсподдержка, Москва, 450000'
//        ]);
//
//        $this->view->registerMetaTag([
//            'name' => 'description',
//            'content' => 'Ипотечный кредит на третьего ребенка по программе господдержки 450000 рублей в Москве и других городах России.'
//        ]);
//
//        $this->view->registerLinkTag(
//            [
//                'rel' => 'canonical',
//                'href' => Url::to(['/zaym/450000'], true)
//            ]
//        );
//
//        return $this->render('450000');
//    }

    public function actionPodZalogNedvizhimosti()
    {
        $this->view->title = 'Займы и кредиты под залог недвижимости в КПК ТРЕСТ - Москва и другие города России';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'займ, кредит, залог, недвижимость, кпк, Москва'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Оформление займов под залог недвижимости для пенсионеров и лиц с плохой кредитной историей. Принимаем под залог дома, квартиры, коммерческую недвижимость и садовые дома с участком. '
        ]);

        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/zaym/pod-zalog-nedvizhimosti'], true)
            ]
        );

        return $this->render('pod-zalog-nedvizhimosti');
    }

    public function actionPotrebKredit()
    {
        $this->view->title = 'Оформить потребительский займ в КПК ТРЕСТ в городе Москва и других городах России';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'оформить, взять, кредит, займ, потребительский, кпк, ТРЕСТ, Москва'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Взять потребительский кредит в КПК ТРЕСТ на выгодных условиях и беспроцентном досрочном погашении. Обработка заявки в течение дня.'
        ]);

        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/zaym/potreb-kredit'], true)
            ]
        );

        return $this->render('potreb-kredit');
    }
}