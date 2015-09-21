<?php

use yii\db\Schema;
use yii\db\Migration;

class m150919_035001_add_fk_to_status_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%status}}', 'user_id', Schema::TYPE_INTEGER . ' NOT NULL');
        $this->addForeignKey('fk_user_status','{{%status}}','id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropColumn('{{%status}}', 'user_id');
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
