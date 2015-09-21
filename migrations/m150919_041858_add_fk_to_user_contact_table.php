<?php

use yii\db\Schema;
use yii\db\Migration;

class m150919_041858_add_fk_to_user_contact_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user_contact}}', 'user_id', Schema::TYPE_INTEGER . ' NOT NULL');
        $this->addForeignKey('fk_user_contact','{{%user_contact}}','user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropColumn('{{%user_contact}}', 'user_id');
        $this->dropForeignKey('fk_user_contact','user_contact');

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
