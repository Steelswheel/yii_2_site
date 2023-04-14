<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%zime}}`.
 */
class m210907_062917_add_data_column_to_zime_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%zaym}}', 'data', $this->json()->after('title'));
        $this->addColumn('{{%zaym}}', 'alias', $this->string()->after('title'));
        $this->dropColumn('{{%zaym}}', 'text');
        $this->dropColumn('{{%zaym}}', 'des_main');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%zaym}}', 'data');
    }
}
