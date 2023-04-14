<?php

use yii\db\Migration;

/**
 * Class m210315_113829_update_table
 */
class m210315_113829_update_table extends Migration
{
    public function up()
    {
        $this->renameTable('citizens_applications','query');
    }

    public function down()
    {
        $this->renameTable('query','citizens_applications');
    }
}
