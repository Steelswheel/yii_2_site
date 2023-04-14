<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%zaym}}`.
 */
class m210801_170802_create_zaym_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%zaym}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'text' => $this->text(),
            'active' => $this->integer(),
            'sort' => $this->integer(),
            'updated_at' => $this->dateTime(),
            'created_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%zaym}}');
    }
}
