<?php
/**
 * Created by PhpStorm.
 * User: andrey.vaganov
 * Date: 08.08.18 >> 14.11.2018
 * Time: 11:43
 */

namespace app\admin\components;


use yii\base\Arrayable;
use yii\base\Model;
use yii\data\DataProviderInterface;
use yii\rest\Serializer;

class CustomSerializer extends Serializer
{


    public function serialize($data)
    {

        $parent = parent::serialize($data);

        $model = false;
        if ($data instanceof Model && $data->hasErrors()) {
            //$model = $data;
        } elseif ($data instanceof Arrayable) {
            $model = $data;
        } elseif ($data instanceof DataProviderInterface) {
            $model = new $data->query->modelClass;
        }

        $arConfig = [];
        if ($model instanceof Model){

            $arConfig['_attributeLabels'] = $model->attributeLabels();

            $enumeration = [];
            foreach($model->attributeLabels() as $itemField => $itemData){
                $method = "getEnumeration".ucfirst($itemField);
                if (method_exists ( $model , $method))
                    $enumeration[$itemField] = $model->$method(true);
            }
            $arConfig['_enumeration'] = $enumeration;

            if ($data instanceof Arrayable){
                $enumeration = [];
                foreach($parent as $itemField => $itemData){
                    $method = "getEnumeration".ucfirst($itemField);
                    if (method_exists ( $model , $method))
                        $enumeration[$itemField] = $model->$method();
                }
                $fieldSettings = method_exists ( $model , 'fieldSettings')
                    ? $model->fieldSettings()
                    : [];

                $arConfig['_enumeration'] = $enumeration;

                $arConfig['_fieldSettings'] = $fieldSettings;
            }

        }

        return is_array($parent)? array_merge($parent, $arConfig): $data;
    }


}