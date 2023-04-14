<?php

namespace app\controllers;

use yii\web\Controller;
use yii\helpers\Url;
use app\admin\models\News;
use Yii;
use yii\web\HttpException;

class NewsController extends Controller
{

    public $layout = '@template/index';

    public function actionIndex()
    {
        $this->view->title = 'Новости КПК ТРЕСТ';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'новости, кпк, ТРЕСТ, Москва'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Последние новости КПК ТРЕСТ, информирование по действующим акциям и программам займов и кредитов'
        ]);

        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/news'], true)
            ]
        );

        $this->view->registerMetaTag([
            'name' => 'yandex-verification',
            'content' => 'de0c4683484c184a'
        ], 'yandex-verification');

        $news = Yii::$app->cache->get('newsCache');

        if (!$news) {
            $modelNews = new News();
            $news = $modelNews::find()->orderBy('published desc')->where(['<=', 'published', date('Y-m-d').' 23:59:59'])->andWhere(['active' => 1]);
            Yii::$app->cache->set('newsCache', $news, 3600);
        }

        return $this->render('index', [
            'news' => $news
        ]);
    }

    public function actionView($id)
    {
        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/news'], true)
            ]
        );

        $this->view->registerMetaTag([
            'name' => 'yandex-verification',
            'content' => 'de0c4683484c184a'
        ], 'yandex-verification');

        $model = News::find()->where(['id' => $id, 'active' => 1])->one();

        if (!$model) {
            throw new HttpException(404);
        } else {
            $this->view->title = 'Новости КПК ТРЕСТ: ' . $model->title;

            $this->view->registerMetaTag([
                'name' => 'keywords',
                'content' => 'новость, кпк, ТРЕСТ'
            ]);

            $this->view->registerMetaTag([
                'name' => 'description',
                'content' => 'Новость КПК ТРЕСТ от ' . (new \DateTime())->format('d.m.Y')
            ]);

            return $this->render('view',[
                'model' => $model
            ]);
        }
    }
}