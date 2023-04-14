<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

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

    public static function tableName()
    {
        return 'leeds';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => date('Y-m-d H:i:s')
            ],
        ];
    }

    public function rules()
    {
        return [
            [['page', 'name', 'phone'],'required'],
            [['email'], 'email', ],
            [['phone'],'validatePhone'],
            [['text'],'validateText', 'skipOnEmpty'=>false],
            [['page', 'name', 'phone', 'email', 'form', 'text'], 'string', 'max' => 255],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
        ];
    }

    public function validatePhone($attribute)
    {
        $str = preg_replace("/[^0-9]/", '', $this->$attribute);
        if (!(strlen($str) === 11)){
            $this->addError($attribute, 'Необходимо заполнить «Телефон».');
        }
    }


    public function validateText($attribute)
    {
        if ($this->form === 'dir' && !(!empty($this->text) && strlen($this->text) > 15)){
            $this->addError($attribute, 'Сообщение должно быть более 15 символов');
        }
    }



    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page' => 'Страница',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'Почта',
            'form' => 'Форма',
            'text' => 'Сообщение',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
