<?php

use yii\db\Schema;
use yii\db\Migration;

class m160110_165737_delete_fk_id_from_status_table_add_userid extends Migration
{
    public function up()
    {
        $this->dropForeignKey('fk_user_status','status');
        $this->addForeignKey('fk_user_status','{{%status}}','user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->addForeignKey('fk_user_status','{{%status}}','id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->dropForeignKey('fk_user_status','status');

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
