<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%reviews}}`.
 */
class m210921_091835_add_link_column_to_reviews_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%reviews}}', 'link', $this->string(255)->after('name'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%reviews}}', 'link');
    }
}
