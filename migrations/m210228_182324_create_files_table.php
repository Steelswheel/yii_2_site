<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%files}}`.
 */
class m210228_182324_create_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%files}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'model' => $this->string(),
            'field' => $this->string(),
            'model_id' => $this->integer(),
            'file' => $this->string(),
            'path' => $this->string(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'deleted' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%files}}');
    }
}
