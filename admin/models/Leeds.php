<?php

namespace app\admin\models;

use Yii;

/**
 * This is the model class for table "leeds".
 *
 * @property int $id
 * @property string|null $page
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $form
 * @property string|null $text
 */
class Leeds extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leeds';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page', 'name', 'phone', 'email', 'form', 'text'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page' => 'Page',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'form' => 'Form',
            'text' => 'Text',
        ];
    }
}
