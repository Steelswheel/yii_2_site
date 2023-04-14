<?php

namespace app\controllers;

use yii\web\Controller;
use yii\helpers\Url;
use app\admin\models\Gallery;
use Yii;

class GalleryController extends Controller
{
    public $layout = '@template/index';

    public function actionIndex()
    {
        $this->view->title = 'Фотогалерея';

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'фотогалерея, кпк, ТРЕСТ, Москва'
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Фотоснимки моментов из жизни компании КПК ТРЕСТ'
        ]);

        $this->view->registerLinkTag(
            [
                'rel' => 'canonical',
                'href' => Url::to(['/gallery'], true)
            ]
        );

        $this->view->registerMetaTag([
            'name' => 'yandex-verification',
            'content' => 'de0c4683484c184a'
        ], 'yandex-verification');

        $gallery = Yii::$app->cache->get('galleryCache');

        if (!$gallery) {
            $modelGallery = new Gallery();
            $gallery = $modelGallery::find()->orderBy('published desc')->where(['<=', 'published', date('Y-m-d').' 23:59:59'])->andWhere(['active' => 1]);
            Yii::$app->cache->set('galleryCache', $gallery, 3600);
        }

        return $this->render('index', [
            'gallery' => $gallery
        ]);
    }
}