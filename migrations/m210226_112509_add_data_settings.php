<?php

use yii\db\Migration;

/**
 * Class m210226_112509_add_data_settings
 */
class m210226_112509_add_data_settings extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function up()
    {
        $data = [
            ['settings' => 'MAIN_LOGO', 'label' => 'Логотип в шапке', 'field_type' => 'img'],
            ['settings' => 'HEADER_TEXT', 'label' => 'Текст в шапке', 'field_type' => 'string'],
            [
                'settings' => 'INFO_MAIN_PAGE',
                'label' => 'Информация на главной странице',
                'field_type' => '[{id: "INFO_LABEL", type:"string", label:"Заголовок"},{id: "INFO_TEXT", type:"text", label:"Текс"}]'
            ],
        ];

        foreach ($data as $item){
            $model = new \app\models\Settings();
            $model->attributes = $item;
            $model->save();
        }
    }

    public function down()
    {

    }

}
