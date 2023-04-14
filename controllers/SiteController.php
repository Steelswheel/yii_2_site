<?php

namespace app\controllers;

use app\admin\models\News;
use app\components\webpConverter;
use app\models\Leeds;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\components\RSSCreator;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public $layout = '@template/index';

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionRss() {
        $result = RSSCreator::create();

        return $this->render('rss', ['result' => $result]);
    }

    public function actionForm()
    {
        $request = Yii::$app->request;
        $session = Yii::$app->session;

        if (empty($session->get('form_sended'))) {
            $model = new Leeds([
                'page'  => $request->post('page'),
                'name'  => $request->post('name'),
                'phone' => $request->post('phone'),
                'email' => $request->post('email'),
                'form'  => $request->post('form'),
                'text'  => $request->post('text')
            ]);

            if (!$model->save()) {
                Yii::$app->response->setStatusCode(422,'Data Validation Failed');
                return $this->asJson($model->errors);
            } else {
                if ($request->post('page') === 'ТРЕСТ') {
                    $page = 'Главная страница';
                } else {
                    $page = $request->post('page');
                }

                $query = [
                    'site' => 'ТРЕСТ',
                    'page'  => $page,
                    'name'  => $request->post('name'),
                    'phone' => $request->post('phone'),
                    'email' => $request->post('email'),
                    'text'  => $request->post('text'),
                    'is_deposit' => !empty($request->post('is_deposit'))
                ];

                $data['review'] = true;
            }

            $session['form_sended'] = [
                'value' => true,
                'lifetime' => 60
            ];

            $data['form_sended'] = $session->get('form_sended');

            return $this->asJson($data);
        } else {
            Yii::$app->response->setStatusCode(423,'Вы уже отправили сообщение');
            return $this->asJson(['code' => 423]);
        }
    }

    public function actionOffline()
    {
        return $this->render('offline');
    }

    public function actionIndex()
    {
        $this->view->title = 'Кредитный потребительский кооператив (КПК) ТРЕСТ в Москве и других городах России';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'Кпк, трест, кооператив, кредитный, потребительский, кредит, займ, вклад, сберегательный'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Выдача кредитов и займов физическим лицам, выгодные вклады в кредитном потребительском кооперативе (кпк) ТРЕСТ в Москве и других городах России. Открытие сберегательных вкладов.'
        ]);

        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/'], true)
            ]
        );

        $this->view->registerMetaTag([
            'name' => 'yandex-verification',
            'content' => 'de0c4683484c184a'
        ], 'yandex-verification');

        $news = Yii::$app->cache->get('newsIndex');

        if (!$news) {
            $modelNews = new News();
            $news = $modelNews::find()->orderBy('published desc')->where(['active' => 1])->limit(3)->all();
            Yii::$app->cache->set('newsIndex', $news, 3600);
        }

        $images = Yii::$app->cache->get('newsImages');

        if (!$images) {
            if (!empty($news)) {
                foreach ($news as $new) {
                    if (!empty($new->imgSite)) {
                        $images[$new->id] = webpConverter::checkImage($new->imgSite);
                    }
                }

                Yii::$app->cache->set('newsImages', $images, 3600);
            }
        }

        return $this->render('index', [
            'news' => $news,
            'images' => $images
        ]);
    }

    public function actionCabinet()
    {
        $this->view->registerMetaTag([
            'name' => 'yandex-verification',
            'content' => 'de0c4683484c184a'
        ], 'yandex-verification');

        return $this->render('cabinet');
    }

    public function actionAbout()
    {
        $this->view->title = 'Информация о КПК ТРЕСТ';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'информация, кпк, трест, Москва'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Информация по работе КПК ТРЕСТ, регулирующих органах и условиях для пайщиков'
        ]);

        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/about'], true)
            ]
        );

        $this->view->registerMetaTag([
            'name' => 'yandex-verification',
            'content' => 'de0c4683484c184a'
        ], 'yandex-verification');

        return $this->render('about');
    }

    public function actionDoc()
    {
        $this->view->title = 'Управляющие документы КПК ТРЕСТ';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'документы, кпк, трест'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'основные управляющие документы КПК ТРЕСТ'
        ]);

        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/doc'], true)
            ]
        );

        $this->view->registerMetaTag([
            'name' => 'yandex-verification',
            'content' => 'de0c4683484c184a'
        ], 'yandex-verification');

        return $this->render('doc');
    }

    public function actionRequisites()
    {
        $this->view->title = 'Реквизиты КПК ТРЕСТ';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'реквизиты, кпк, ТРЕСТ, Москва'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Юридическая информация и реквизиты кредитного потребительского кооператива ТРЕСТ'
        ]);

        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/requisites'], true)
            ]
        );

        $this->view->registerMetaTag([
            'name' => 'yandex-verification',
            'content' => 'de0c4683484c184a'
        ], 'yandex-verification');

        return $this->render('requisites');
    }

    public function actionMission()
    {
        $this->view->title = 'Миссия КПК ТРЕСТ';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'миссия, кпк, трест'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Какие цели и задачи преследует кпк ТРЕСТ'
        ]);

        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/mission'], true)
            ]
        );

        $this->view->registerMetaTag([
            'name' => 'yandex-verification',
            'content' => 'de0c4683484c184a'
        ], 'yandex-verification');

        return $this->render('mission');
    }

    public function actionContacts()
    {
        $this->view->title = 'Контакты КПК ТРЕСТ';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'контакты, кпк, трест'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Контактные данные кредитного потребительского кооператива ТРЕСТ в городе Москва'
        ]);

        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/contacts'], true)
            ]
        );

        $this->view->registerMetaTag([
            'name' => 'yandex-verification',
            'content' => 'de0c4683484c184a'
        ], 'yandex-verification');

        return $this->render('contacts');
    }

    public function actionDir()
    {
        $this->view->title = 'Обратиться к руководителю КПК ТРЕСТ';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'руководитель, кпк, трест'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Прямое обращение к руководителю КПК ТРЕСТ'
        ]);

        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/dir'], true)
            ]
        );

        $this->view->registerMetaTag([
            'name' => 'yandex-verification',
            'content' => 'de0c4683484c184a'
        ], 'yandex-verification');

        return $this->render('dir');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $this->view->registerMetaTag([
            'name' => 'yandex-verification',
            'content' => 'de0c4683484c184a'
        ], 'yandex-verification');

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }



}
