<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%problem}}`.
 */
class m210304_110712_create_problem_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%problem}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'is_active' => $this->integer(),
            'label' => $this->string(),
            'order' => $this->integer(),
            'deleted_at' => $this->dateTime(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%problem}}');
    }
}
