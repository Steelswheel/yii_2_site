<?php

namespace app\models;

use app\admin\components\ResizeImg;
use app\components\CachedBehavior;
use app\components\UploadFilesBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property int|null $active
 * @property string|null $name
 * @property string|null $email
 * @property string|null $company
 * @property string|null $city
 * @property string|null $link
 * @property string|null $text
 * @property string|null $img
 * @property string|null $video
 * @property string|null $ip
 * @property string|null $added
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 */
class Reviews extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $img;
    public $video;

    public static function tableName()
    {
        return 'reviews';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => date('Y-m-d H:i:s'),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at', 'added'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
            'files' => [
                'class' => UploadFilesBehavior::class,
                'fields' => [
                    'img' => [
                        'path' => '/file/' . $this->tableName() . '/',
                        'validate' => [
                            'extensions' => ['png', 'jpg', 'jpeg', 'webp']
                        ]
                    ],
                    'video' => [
                        'path' => '/file/' . $this->tableName() . '/',
                        'validate' => [
                            'extensions' => ['mov', 'mpeg4', 'mp4', 'avi', 'wmv', 'flv', 'webm'],
                            'maxSize' => 1024*1024*200
                        ]
                    ]
                ]
            ],
            'CachedBehavior' => [
                'class' => CachedBehavior::class,
                'cache_key' => ['reviewsIndex'],
            ]
        ];
    }



    public function rules()
    {
        return [
            [['name', 'email', 'city', 'text', 'link'], 'required'],
            [['name', 'email', 'city', 'text', 'link', 'company'], 'trim'],
            [['active'], 'integer'],
            [['link'], 'url', 'defaultScheme' => 'https'],
            [['text'], 'string', 'min' => 10],
            [['ip', 'created_at', 'updated_at', 'deleted_at', 'added'], 'safe'],
            [['name'], 'string', 'max' => 40],
            [['link', 'company'], 'string', 'max' => 200],
            [['email'], 'email'],
            [['img'], 'file', 'extensions' => 'png, jpg, jpeg,webp', 'maxFiles' => 5],
            [['video'], 'file', 'extensions' => 'mov, mpeg4, mp4, avi, wmv, flv, webm', 'maxFiles' => 1, 'maxSize' => 1024*1024*200]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'active' => 'active',
            'name' => 'Имя Фамилия',
            'email' => 'Электронная почта',
            'company' => 'Название компании',
            'city' => 'Город',
            'link' => 'Ссылка на социальную сеть',
            'text' => 'Текст',
            'ip' => 'IP-адрес',
            'added' => 'Дата добавления',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    public function getImages($model, $model_id, $field) {
        $files = $this->behaviors['files']->getLoadedFiles($model, $model_id, $field, true);

        $urls = [
            'files' => [],
            'thumbs' => []
        ];

        if ($files) {
            foreach ($files as $file => $value) {
                $urls['files'][] = $value['url'];
                $urls['thumbs'][] = $value['thumb'];
            }

            return $urls;
        } else {
            return false;
        }
    }

    public function getVideo($model, $model_id, $field) {
        $file = $this->behaviors['files']->getLoadedFiles($model, $model_id, $field);

        if ($file) {
            return $file[0]['url'];
        } else {
            return false;
        }
    }

    public function getDateSite() {
        if ($this->added) {
            return date('d.m.Y', strtotime($this->added));
        }

        return '';
    }


}
