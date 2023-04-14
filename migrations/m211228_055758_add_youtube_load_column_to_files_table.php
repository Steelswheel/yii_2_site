<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%files}}`.
 */
class m211228_055758_add_youtube_load_column_to_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('files', 'youtube_load', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('files', 'youtube_load');
    }
}
