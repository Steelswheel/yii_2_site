<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%citizens_applications}}`.
 */
class m210311_063408_create_citizens_applications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%citizens_applications}}', [
            'id' => $this->primaryKey(),
            'problem_id' => $this->integer(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'problem_des' => $this->text(),
            'feedback' => $this->integer()->defaultValue(0),
            'address_value' => $this->string(),
            'is_active' => $this->integer()->defaultValue(0),
            'is_map' => $this->integer()->defaultValue(0),
            'code_activate' => $this->string(),
            'address_id' => $this->integer(),
            'geo_lat' => $this->float(),
            'geo_lon' => $this->float(),
            'user_created' => $this->integer(),
            'deleted_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_at' => $this->dateTime(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%citizens_applications}}');
    }
}
