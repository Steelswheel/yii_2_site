<?php

namespace app\admin\models;

use app\admin\components\FilesBehavior;
use app\admin\components\ResizeImg;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property int|null $active
 * @property string|null $name
 * @property string|null $link
 * @property string|null $city
 * @property string|null $company
 * @property string|null $text
 * @property string|null $phone
 * @property string|null $email
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
    public $img;
    public $video;

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
                'class' => FilesBehavior::class,
                'files' => [
                    'img' => [
                        'validate' => [
                            'extensions' => 'png,jpg,jpeg,webp',
                            'maxFiles' => 5,
                        ],
                        'beforeSaveFile' => [
                            'class' => ResizeImg::class,
                            'settings' => [
                                'resize' => 1200
                            ]
                        ],
                    ],
                    'video' => [
                        'validate' => [
                            'extensions' => 'mov, mpeg4, mp4, avi, wmv, flv, webm',
                            'maxFiles' => 1,
                        ]
                    ]
                ]
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['name', 'city', 'email', 'text', 'link'], 'required'],
            [['name', 'email', 'text', 'link', 'city', 'company'], 'trim'],
            [['text'], 'string'],
            [['link'], 'url',  'defaultScheme' => 'https'],
            [['ip', 'created_at', 'updated_at', 'deleted_at', 'added'], 'safe'],
            [['name'], 'string', 'max' => 150],
            [['phone', 'email'], 'string', 'max' => 200],
            [['img'], 'safe'],
            [['video'], 'file', 'extensions' => 'mov, mpeg4, mp4, avi, wmv, flv, webm', 'maxFiles' => 1, 'maxSize' => 1024*1024*200]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'active' => 'Активен',
            'name' => 'Имя',
            'text' => 'Отзыв',
            'link' => 'Ссылка на социальную сеть',
            'phone' => 'Телефон',
            'city' => 'Город',
            'company' => 'Название компании',
            'email' => 'Почта',
            'img' => 'Фото отзыва',
            'video' => 'Видео отзыва',
            'ip' => 'IP-адрес',
            'added' => 'Дата создания',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
            'deleted_at' => 'Дата удаления',
        ];
    }

    public function fields()
    {
        return [
            'id',
            'active',
            'name',
            'text',
            'link',
            'phone' ,
            'email',
            'city',
            'company',
            'ip',
            'added',
            'created_at',
            'updated_at',
            'deleted_at',
            'img'=> function() {
                return $this->behaviors['files']->img;
            },
            'video'=> function() {
                return $this->behaviors['files']->video;
            }
        ];
    }
}
