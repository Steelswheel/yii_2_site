<?php

namespace app\models;

use app\admin\components\FilesBehavior;
use app\admin\components\ResizeImg;
use app\admin\models\Files;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "query".
 *
 * @property int $id
 * @property int|null $problem_id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $unrestricted_value
 * @property int|null $verified
 * @property string|null $code_activate
 * @property float|null $geo_lat
 * @property float|null $geo_lon
 * @property int|null $address_id
 * @property string|null $problem_des
 * @property string|null $deleted_at
 * @property string|null $updated_at
 * @property string|null $created_at
 */
class Query extends \yii\db\ActiveRecord
{

    public $phone_email;
    public $address;
    public $img;

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
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date('Y-m-d H:i:s',time())
            ]
        ];
    }

    public function beforeSave($insert)
    {
        if (is_array($this->address) && isset($this->address['data'])){
            $this->address['data']['value'] =  $this->address['value'];
            $this->address['data']['unrestricted_value'] =  $this->address['unrestricted_value'];
            $this->address_id = Address::addAddress($this->address['data']);
            $this->address_value = $this->address['value'];
            $this->geo_lat = $this->address['data']['geo_lat'];
            $this->geo_lon = $this->address['data']['geo_lon'];
        }
        return parent::beforeSave($insert);
    }

    public function rules()
    {
        return [
            [['phone_email','problem_id','problem_des','problem_des','name'],'required'],
            [['problem_id', 'feedback', 'is_active', 'is_map', 'address_id', 'user_created'], 'integer'],
            [['problem_des'], 'string'],
            [['geo_lat', 'geo_lon'], 'number'],
            [['deleted_at', 'updated_at', 'created_at'], 'safe'],
            [['address_value', 'code_activate'], 'string', 'max' => 255],
            [['name', 'phone', 'email'], 'string', 'max' => 50],
            [['phone_email'],'validatePhoneEmail'],
        ];
    }

    public function validatePhoneEmail(){
        $this->phone = $this->checkPhone($this->phone_email) ?: null;
        $this->email = $this->checkEmail($this->phone_email) ?: null;
        if (!($this->phone || $this->email)){
            $this->addError('phone_email', 'Заполните телефон или почту');
        }
    }

    public function checkEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function checkPhone($phone){
        $val = preg_replace('/[^0-9а-яА-ЯЁёa-zA-Z]/', '', $phone);
        $valNumber = preg_replace('/[^0-9]/', '', $phone);
        $val[0] = 8;
        if (strlen($val) === 11 && strlen($valNumber) === strlen($val)){
            return $val;
        }
        return false;
    }

    public function getProblemName(){
        return $this->hasOne(Problem::class,['id' => 'problem_id'])->with('icon');
    }

    public function getAllImg(){
        return $this->hasMany(Files::class,['model_id'=>'id'])->where(['model' => 'query','field'=>'img']);
    }

    public static function getCountAllQuery(){
        return Query::find()
            ->where(['and',
                ['>','geo_lat',0],
                ['>','geo_lon',0],
            ])->count();
    }

    public static function getAllQuery(){
        $model = Query::find()
            ->with('problemName','allImg')
            ->where(['and',
                ['>','geo_lat',0],
                ['>','geo_lon',0],
            ])->all();

        $d = array_map(function($item){
            $problem = null;
            $problem_icon = null;
            $allImg = null;
            if ($item->problemName){
                $problem = $item->problemName->label;
                if ($item->problemName->icon){
                    $problem_icon = $item->problemName->icon->path.$item->problemName->icon->file;
                }
            }
            if ($item->allImg){
                $allImg = array_map(function($itemImg){
                    return $itemImg->path.'thumb_'.$itemImg->file;
                },$item->allImg);
            }
            return [
                'id' => $item->id,
                'problem' => $problem,
                'problem_icon' => $problem_icon ,
                'img' => $allImg ,
                'name' => $item->name,
                'des' => $item->problem_des,
                'address' => $item->address_value,
                'lat' => $item->geo_lat,
                'lon' => $item->geo_lon,
                // 'created_at' => $item->created_at
            ];
        },$model);

        //$a = $model[0]->problemName;
        return $d;
    }


}
