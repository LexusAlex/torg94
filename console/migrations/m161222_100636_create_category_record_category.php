<?php

use yii\db\Migration;

class m161222_100636_create_category_record_category extends Migration
{
    public function up()
    {
        // category
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),
        ]);
        // record_category
        $this->createTable(
            '{{%record_category}}',
            [
                'record_id' => $this->integer()->notNull(), //record
                'category_id' => $this->integer()->notNull(), // category
                //'PRIMARY KEY(record_id, tag_id)'
            ]
        );
        $this->addPrimaryKey('', '{{%record_category}}', ['record_id', 'category_id']);
        // index tag_article.record_id
        $this->createIndex('I_record_id_record_category', '{{%record_category}}', 'record_id');
        // fk tag_article.record_id
        $this->addForeignKey('FK_record_id_record_category', //name foreignKey
            '{{%record_category}}', // table foreignKey текущая таблица
            'record_id', // column foreignKey
            '{{%record}}', // table ref
            'id', // column ref
            'CASCADE', //action DELETE
            'CASCADE' //action UPDATE
        );

        // index tag_article.tag_id
        $this->createIndex('I_category_id_record_category', '{{%record_category}}', 'category_id');
        // fk tag_article.tag_id
        $this->addForeignKey('FK_category_id_record_category', //name foreignKey
            '{{%record_category}}', // table foreignKey текущая таблица
            'category_id', // column foreignKey
            '{{%category}}', // table ref
            'id', // column ref
            'CASCADE', //action DELETE
            'CASCADE' //action UPDATE
        );

        $this->batchInsert(
            'category',
            ['name'],
            [
                ['Заказчику'],
                ['Поставщику'],
                ['44-ФЗ'],
                ['223-ФЗ'],
            ]
        );
    }

    public function down()
    {
        $this->dropForeignKey('FK_category_id_record_category','{{%record_category}}');
        $this->dropIndex('I_category_id_record_category','{{%record_category}}');

        $this->dropForeignKey('FK_record_id_record_category','{{%record_category}}');
        $this->dropIndex('I_record_id_record_category','{{%record_category}}');

        $this->dropTable('{{%record_category}}');
        $this->dropTable('{{%category}}');
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
