<?php

namespace app\models;

use app\admin\components\FilesBehavior;
use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string|null $settings
 * @property string|null $label
 * @property string|null $field_type
 * @property string|null $value
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 */
class Settings extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'settings';
    }


    public static function field($settings,$field = false, $default = false){
        $s = Settings::findOne(['settings' => $settings]);
        $r = [];

        foreach ($s['fields'] as $item){
            if (in_array($item['type'],['file','files'])){

                $files = array_map(function($item){
                    return $item['url'];
                },FilesBehavior::getLoadFile('settings',$s->id,$item['id']));


                $r[$item['id']] = $item['type'] === 'files' ? $files : isset($files[0]) ? $files[0] : '';
            }else{
                $r[$item['id']] = isset($item['value']) ? $item['value'] : '';
            }
        }
        if ($field){
            if (isset($r[$field])){
                return $r[$field];
            }

            return $default;
        }
        return $r;
    }
}
