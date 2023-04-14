<?php

namespace app\admin\models;

use app\admin\components\FilesBehavior;
use app\admin\components\TimestampBehavior;
use app\components\CachedBehavior;
use app\components\UploadFilesBehavior;
use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $intro
 * @property string|null $text
 * @property int|null $active
 * @property string|null $published
 * @property string|null $updated_at
 * @property string|null $created_at
 * @property string|null $video
 */
class News extends \yii\db\ActiveRecord
{
    public $img;
    public $video;

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            'files' => [
                'class' => FilesBehavior::class,
                'files' => [
                    'img' => [
                        'validate' => [
                            'extensions' => 'png,jpg,jpeg,webp',
                            'maxFiles' => 1
                        ]
                    ]
                ]
            ],
            'uploaded_files' => [
                'class' => UploadFilesBehavior::class,
                'fields' => [
                    'video' => [
                        'path' => '/video/',
                        'validate' => [
                            'extensions' => ['mov', 'mpeg4', 'mp4', 'avi', 'wmv', 'flv', 'webm'],
                            'maxSize' => 1024*1024*200
                        ]
                    ]
                ]
            ],
            'CachedBehavior' => [
                'class' => CachedBehavior::class,
                'cache_key' => ['newsIndex', 'newsCache']
            ]
        ];
    }

    public static function tableName()
    {
        return 'news';
    }


    public function rules()
    {
        return [
            [['img'],'safe'],
            [['intro', 'text'], 'string'],
            [['active'], 'integer'],
            [['published', 'updated_at', 'created_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['video'], 'file', 'extensions' => 'mov, mpeg4, mp4, avi, wmv, flv, webm', 'maxFiles' => 1, 'maxSize' => 1024*1024*200]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'img' => 'Картинка новости',
            'id' => 'ID',
            'title' => 'Заголовок',
            'intro' => 'Интро',
            'text' => 'Основной текст',
            'active' => 'Активная',
            'published' => 'Дата побликации',
            'updated_at' => 'Дата обновления',
            'created_at' => 'Дата создания'
        ];
    }

    public function getImgSite(){
        $img = $this->behaviors['files']->img;
        if ($img){
            return $img[0]['url'];
        }
        return '';
    }

    public function getDateSite(){
        if ($this->published){
            return date('d.m.Y',strtotime($this->published));
        }
       return '';
    }


    public function fields()
    {
        return [
            'id',
            'title',
            'intro',
            'text',
            'active',
            'published',
            'updated_at',
            'created_at',
            'img'=> function() {
                return $this->behaviors['files']->img;
            }
        ];
    }

    public function getVideo($model, $model_id, $field) {
        $file = $this->behaviors['uploaded_files']->getLoadedFiles($model, $model_id, $field);

        if ($file) {
            return $file[0]['url'];
        } else {
            return false;
        }
    }
}
