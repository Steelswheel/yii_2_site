<?php


namespace app\controllers;

use Yii;
use app\models\Reviews;
use yii\web\Controller;
use yii\helpers\Url;

class ReviewsController extends Controller
{

    public $layout = '@template/index';

    public function actionIndex()
    {
        $this->view->title = 'Отзывы о взаимодействии с кредитным потребительским кооперативом ТРЕСТ';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'отзывы, кпк. Трест, Москва'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Реальные отзывы КПК ТРЕСТ'
        ]);

        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/reviews'], true)
            ]
        );

        $this->view->registerMetaTag([
            'name' => 'yandex-verification',
            'content' => 'de0c4683484c184a'
        ], 'yandex-verification');

        $reviews = Yii::$app->cache->get('reviewsIndex');

        if (!$reviews) {
            $modelReviews = new Reviews();
            $reviews = $modelReviews::find()->orderBy('added desc')->where(['<=','added', date('Y-m-d').' 23:59:59'])->andWhere(['active' => 1]);
            Yii::$app->cache->set('reviewsIndex', $reviews, 3600);
        }

        return $this->render('index', ['reviews' => $reviews]);
    }

    public function actionAdd()
    {
        $post = Yii::$app->request->post();
        unset($post['_csrf']);
        $model = new Reviews($post);
        $model->ip = getenv('REMOTE_ADDR');

        if (!$model->save()) {
            Yii::$app->response->setStatusCode(422,'Data Validation Failed');
            return $this->asJson($model->errors);
        } else {
            $data['review'] = true;
        }

        return $this->asJson($data);
    }
}