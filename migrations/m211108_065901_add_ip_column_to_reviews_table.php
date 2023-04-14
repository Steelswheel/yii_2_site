<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%reviews}}`.
 */
class m211108_065901_add_ip_column_to_reviews_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('reviews', 'ip', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
