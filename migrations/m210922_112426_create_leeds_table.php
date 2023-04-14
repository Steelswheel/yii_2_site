<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%leeds}}`.
 */
class m210922_112426_create_leeds_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%leeds}}', [
            'id' => $this->primaryKey(),
            'page' => $this->string(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'form' => $this->string(),
            'text' => $this->text(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'deleted_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%leeds}}');
    }
}
