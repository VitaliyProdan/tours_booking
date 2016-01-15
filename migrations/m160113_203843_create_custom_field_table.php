<?php

use yii\db\Schema;
use yii\db\Migration;

class m160113_203843_create_custom_field_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%custom_field}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'tour_id' => $this->integer(),
            'sort' => $this->integer(),
        ]);

        $this->createIndex('idx-custom_field-tour_id', '{{%custom_field}}', 'tour_id');
        $this->addForeignKey('fk-custom_field-post_id', '{{%custom_field}}', 'tour_id', '{{%tour}}', 'id', 'CASCADE');

    }

    public function down()
    {
        $this->dropTable('{{%custom_field}}');
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
