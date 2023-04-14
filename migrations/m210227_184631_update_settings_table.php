<?php

use yii\db\Migration;

/**
 * Class m210227_184631_update_settings_table
 */
class m210227_184631_update_settings_table extends Migration
{
    public function up()
    {
        $this->addColumn('settings', 'fields', $this->json()->after('label'));
        $this->addColumn('settings', 'values', $this->json()->after('fields'));
    }

    public function down()
    {
        $this->dropColumn('settings', 'fields');
        $this->dropColumn('settings', 'values');
    }
}
