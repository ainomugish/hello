<?php

use yii\db\Schema;
use yii\db\Migration;

class m150919_204807_update_name_profile extends Migration
{
    public function up()
    {
        $this->alterColumn('{{%profile}}', 'name', Schema::TYPE_STRING . '(255) DEFAULT "Your Name"');
    }

    public function down()
    {
        echo "m150919_204807_update_name_profile cannot be reverted.\n";

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
