<?php

namespace app\admin\models;

use app\admin\components\FilesBehavior;
use app\admin\components\TimestampBehavior;
use app\components\CachedBehavior;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $active
 * @property string|null $published
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Gallery extends \yii\db\ActiveRecord
{
    public $img;

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
            'CachedBehavior' => [
                'class' => CachedBehavior::class,
                'cache_key' => ['galleryIndex', 'galleryCache']
            ]
        ];
    }

    public static function tableName()
    {
        return 'gallery';
    }


    public function rules()
    {
        return [
            [['img'],'safe'],
            [['active'], 'integer'],
            [['published', 'updated_at', 'created_at'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'img' => 'Фото',
            'id' => 'ID',
            'name' => 'Подпись',
            'published' => 'Опубликовано',
            'active' => 'Активная',
            'updated_at' => 'Дата обновления',
            'created_at' => 'Дата создания'
        ];
    }

    public function getImgSite() {
        $img = $this->behaviors['files']->img;

        if ($img) {
            return $img[0]['url'];
        }

        return '';
    }

    public function getDateSite() {
        if ($this->published) {
            return date('d.m.Y',strtotime($this->published));
        }

        return '';
    }

    public function fields()
    {
        return [
            'id',
            'name',
            'published',
            'active',
            'updated_at',
            'created_at',
            'img'=> function() {
                return $this->behaviors['files']->img;
            }
        ];
    }
}
