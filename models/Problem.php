<?php

namespace app\models;

use app\admin\models\Files;
use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $is_active
 * @property int|null $label
 * @property string|null $order
 * @property string|null $deleted_at
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Problem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'problem';
    }

    public function helpTree($ar,$l = null){
        $el = [];
        foreach ($ar as $item){
            if ($item['parent_id'] === $l){
                $children = $this->helpTree($ar, $item['id']);
                if (count($children) > 0){
                    $el[] = [
                        'value' => (int)$item['id'],
                        'label' => $item['label'],
                        'children' => $children,
                    ];
                }else{
                    $el[] = [
                        'value' => (int)$item['id'],
                        'label' => $item['label'],
                    ];
                }
            }
        }
        return $el;
    }

    public function getEnum(){
        $m = Problem::find()->orderBy('order')->asArray()->all();
        return $this->helpTree($m);
    }



    public function getIcon(){
        return $this->hasOne(Files::class,['model_id'=>'id'])->where(['model' => 'problem','field'=>'icon']);
    }
}
