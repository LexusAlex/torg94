<?php

use yii\db\Migration;

class m170120_111657_create_table_subscribe extends Migration
{
    public function up()
    {
        $this->createTable('{{%subscribe}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(100)->notNull()->unique(),
            'status' => $this->integer()
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%subscribe}}');
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
