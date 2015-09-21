<?php

use yii\db\Schema;
use yii\db\Migration;

class m150908_074116_create_user_contact_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_contact}}', [
            'id' => Schema::TYPE_PK,
            'contact_type' => Schema::TYPE_TEXT.' NOT NULL DEFAULT ""',
            'info' => Schema::TYPE_TEXT . ' NOT NULL DEFAULT ""',
        ], $tableOptions);
        //$this->addForeignKey('fk_user_contact_user_id', '{{%user_contact}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%user_contact}}');
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
