<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%zaym}}`.
 */
class m210802_123714_add_des_main_column_to_zaym_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%zaym}}', 'des_main', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%zaym}}', 'des_main');
    }
}
