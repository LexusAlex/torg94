<?php

use yii\db\Migration;

class m161125_095619_create_tables_record_type extends Migration
{
    public function up()
    {
        // record
        $this->createTable('{{%record}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'date' => $this->dateTime()->null(),
            'archive' => $this->integer(1)->notNull()->defaultValue(0),
            'status'=> $this->integer()->notNull()->defaultValue(1),
            'author'=> $this->string(255)->notNull(),
            'link'=> $this->string(255)->notNull(),
            'picture_annotation'=> $this->string(255)->notNull(),
            'picture_text'=> $this->string(255)->notNull(),
            'annotation'=> $this->text()->notNull(),
            'text'=> $this->text()->notNull(),
            'tid'=> $this->integer(11)->notNull()->defaultValue(0),
            'type'=> $this->string(4)->notNull(),
        ]);
        // type
        $this->createTable('{{%type}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
        ]);

        $this->createIndex('In_type_id', '{{%record}}', 'tid');
        $this->addForeignKey('FK_type_id', //name foreignKey
            '{{%record}}', // table foreignKey
            'tid', // column foreignKey
            '{{%type}}', // table ref
            'id', // column ref
            //RESTRICT === NO ACTION - error
            //CASCADE - cascade delete or update
            //SET DEFAULT - No InnoDb
            //SET NULL - NULL
            'CASCADE', //action DELETE
            'CASCADE' //action UPDATE
        );
    }

    public function down()
    {
        $this->dropForeignKey('FK_type_id','{{%record}}');
        $this->dropIndex('In_type_id','{{%record}}');

        $this->dropTable('{{%type}}');
        $this->dropTable('{{%record}}');
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
