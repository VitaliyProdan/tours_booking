<?php

use yii\db\Schema;
use yii\db\Migration;

class m160113_201836_create_tour_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%tour}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'created_at' =>  $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%tour}}');
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
