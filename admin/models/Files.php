<?php

namespace app\admin\models;



use app\admin\components\TimestampBehavior;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string $name
 * @property string $model
 * @property string $field
 * @property int $model_id
 * @property string $file
 * @property string $path
 * @property string $type
 * @property int $size
 * @property int $deleted
 * @property string $date_create
 * @property string $date_update
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model_id', 'size', 'deleted'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'model', 'field', 'file', 'path', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'model' => 'Model',
            'field' => 'Field',
            'model_id' => 'Model ID',
            'file' => 'File',
            'path' => 'Path',
            'type' => 'Type',
            'size' => 'Size',
            'deleted' => 'Deleted',
            'created_at' => 'created at',
            'updated_at' => 'updated at',
        ];
    }

}
