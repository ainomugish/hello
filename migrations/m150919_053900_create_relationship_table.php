<?php

use yii\db\Schema;
use yii\db\Migration;

class m150919_053900_create_relationship_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }


        $this->createTable('{{%relationship}}', [
            'user_one_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'user_two_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'status' => Schema::TYPE_SMALLINT.' UNSIGNED NOT NULL DEFAULT 0',
            'action_user_id' => Schema::TYPE_INTEGER. ' NOT NULL',
        ], $tableOptions);

        $this->addForeignKey('fk_relationship_user_one_id', '{{%relationship}}', 'user_one_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_relationship_user_two_id', '{{%relationship}}', 'user_two_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_relationship_action_user_id', '{{%relationship}}', 'action_user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        //$this->createIndex('user_unique', '{{%relationship}}', 'user_one_id', true);
        $this->addPrimaryKey('unique_users_id', '{{%relationship}}',['user_one_id','user_two_id']);

    }


    public function down()
    {
        $this->dropTable('{{%relationship}}');

        return false;
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
