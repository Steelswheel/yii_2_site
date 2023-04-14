<?php
/**
 * Created by PhpStorm.
 * User: andrey.vaganov
 * Date: 13.08.18
 * Time: 16:20
 */

namespace app\admin\components;


use yii\base\Model;
use yii\rest;

class AttributesActions extends rest\Action
{

    public $scenario = Model::SCENARIO_DEFAULT;

    public function run(){


        $model = new $this->modelClass;

        $model->scenario = $this->scenario;

        $attributeLabel = $model->attributeLabels();


        $enumeration = [];

        foreach($attributeLabel as $itemField => $itemData){
            $method = "getEnumeration".ucfirst($itemField);
            if (method_exists ( $model , $method))
                $enumeration[$itemField] = $model->$method();


        }



        $defaultValue = method_exists ( $model , 'defaultValue')
            ? $model->defaultValue()
            : [];

        $fieldSettings = method_exists ( $model , 'fieldSettings')
            ? $model->fieldSettings()
            : [];

        return [
            '_defaultValue' => $defaultValue,
            '_attributeLabels' => $attributeLabel,
            '_enumeration' => $enumeration,
            '_scenario' => $model->scenario,
            '_fieldSettings' => $fieldSettings,
        ];
    }
}