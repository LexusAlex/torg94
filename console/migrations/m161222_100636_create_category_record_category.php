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
            'last_record_id' => $this->integer()
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
            ['name','last_record_id'],
            [
                ['Заказчику',8577],
                ['Поставщику',8577],
                ['44-ФЗ',8577],
                ['223-ФЗ',8577],
                ['Закон',8577],
                ['В мире',8577],
                ['Аналитика',8577],
                ['Тема дня',8577],
                ['Закупки',8577],
                ['Сервисы',8577],
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
