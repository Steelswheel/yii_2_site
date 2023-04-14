<?php

namespace app\admin\models;

use app\admin\components\FilesBehavior;
use app\admin\components\ResizeImg;
use Yii;
use app\admin\components\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "query".
 *
 * @property int $id
 * @property int|null $problem_id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $problem_des
 * @property int|null $feedback
 * @property string|null $address_value
 * @property int|null $is_active
 * @property int|null $is_map
 * @property string|null $code_activate
 * @property int|null $address_id
 * @property float|null $geo_lat
 * @property float|null $geo_lon
 * @property int|null $user_created
 * @property string|null $deleted_at
 * @property string|null $updated_at
 * @property string|null $created_at
 */
class Query extends \yii\db\ActiveRecord
{

    public $img;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'query';
    }

    public function behaviors()
    {
        return [
            'files' => [
                'class' => FilesBehavior::class,
                'files' => [
                    'img' => [
                        'validate' => [
                            'extensions' => 'png,jpg,jpeg,webp',
                            'maxFiles' => 10,
                        ],
                        'beforeSaveFile' => [
                            'class' => ResizeImg::class,
                            'settings' => [
                                'resize' => 1200
                            ]
                        ],
                    ]
                ]
            ],
            TimestampBehavior::class,
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img'],'safe'],
            [['problem_id', 'feedback', 'is_active', 'is_map', 'address_id', 'user_created'], 'integer'],
            [['problem_des'], 'string'],
            [['geo_lat', 'geo_lon'], 'number'],
            [['deleted_at', 'updated_at', 'created_at'], 'safe'],
            [['address_value', 'code_activate'], 'string', 'max' => 255],
            [['name', 'phone', 'email'], 'string', 'max' => 50],
        ];
    }

    public function getEnumerationProblem_id(){
        return (new Problem())->enumerationParent_id;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'problem_id' => 'Проблема',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'Почта',
            'problem_des' => 'Описание проблемы',
            'feedback' => 'Обратная связь',
            'address_value' => 'Адрес строкой',
            'is_active' => 'Подвержден',
            'is_map' => 'Из карты',
            'code_activate' => 'Код активации',
            'address_id' => 'Адрес',
            'geo_lat' => 'Geo Lat',
            'geo_lon' => 'Geo Lon',
            'user_created' => 'User Created',
            'deleted_at' => 'Deleted At',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'img'=> 'Фото'
        ];
    }

    public function fields()
    {
        return [
            'id',
            'problem_id',
            'name',
            'phone',
            'email',
            'problem_des',
            'feedback',
            'address_value',
            'is_active',
            'is_map',
            'code_activate',
            'address_id',
            'geo_lat',
            'geo_lon',
            'user_created',
            'created_at',
            'img'=> function(){
                return $this->behaviors['files']->img;
            }
        ];
    }
}
