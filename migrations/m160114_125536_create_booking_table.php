<?php

use yii\db\Schema;
use yii\db\Migration;

class m160114_125536_create_booking_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%booking}}', [
            'id' => $this->primaryKey(),
            'tour_id' => $this->integer(),
            'result' => $this->text(),
            'created_at' => $this->integer(),
        ]);

        $this->createIndex('idx-booking-tour_id', '{{%booking}}', 'tour_id');
        $this->addForeignKey('fk-booking-tour_id', '{{%booking}}', 'tour_id', '{{%tour}}', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%booking}}');
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
