<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%reviews}}`.
 */
class m211005_063616_add_columns_to_reviews_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('reviews', 'company', $this->string());
        $this->addColumn('reviews', 'city', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('reviews', 'company');
        $this->dropColumn('reviews', 'city');
    }
}
