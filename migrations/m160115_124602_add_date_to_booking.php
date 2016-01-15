<?php

use yii\db\Schema;
use yii\db\Migration;

class m160115_124602_add_date_to_booking extends Migration
{
    public function up()
    {
        $this->addColumn('booking', 'date', 'date');
    }

    public function down()
    {
        $this->dropColumn('booking', 'date');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
