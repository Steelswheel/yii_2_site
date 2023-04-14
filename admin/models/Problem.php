<?php

namespace app\admin\models;

use app\admin\components\FilesBehavior;
use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $is_active
 * @property string|null $label
 * @property int|null $order
 * @property string|null $deleted_at
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Problem extends \yii\db\ActiveRecord
{


    public $icon;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'problem';
    }


    public function behaviors()
    {
        return [
            'files' => [
                'class' => FilesBehavior::class,
                'files' => [
                    'icon' => [
                        'validate' => [
                            'extensions' => 'png,jpg,jpeg,webp',
                            'maxFiles' => 1
                        ],
                    ]
                ]
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['icon'],'safe'],
            [['parent_id', 'is_active', 'order'], 'integer'],
            [['deleted_at', 'created_at', 'updated_at'], 'safe'],
            [['label'], 'string', 'max' => 255],
        ];
    }

    public function helpTree($ar,$l = null){
        $el = [];
        foreach ($ar as $item){
            if ($item['parent_id'] === $l){
                $children = $this->helpTree($ar, $item['id']);
                if (count($children) > 0){
                    $el[] = [
                        'id' => (int)$item['id'],
                        'label' => $item['label'],
                        'children' => $children,
                    ];
                }else{
                    $el[] = [
                        'id' => (int)$item['id'],
                        'label' => $item['label'],
                    ];
                }
            }
        }
        return $el;
    }

    public function getEnumerationParent_id(){
        $m = Problem::find()->orderBy('order')->asArray()->all();
        return $this->helpTree($m);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родитель',
            'is_active' => 'Активный',
            'label' => 'Заголовок',
            'order' => 'Сортировка',
            'icon' => 'Иконка меню',
            'deleted_at' => 'Дата удаления',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата редактирования',
        ];
    }



    public function fields()
    {
        return [
            'id',
            'parent_id' ,
            'is_active' ,
            'label',
            'order',
            'deleted_at',
            'created_at',
            'updated_at',
            'icon'=> function(){
                return $this->behaviors['files']->icon;
            }
        ];
    }
}
