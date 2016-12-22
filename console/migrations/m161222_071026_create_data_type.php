<?php

use yii\db\Migration;

class m161222_071026_create_data_type extends Migration
{
    public function up()
    {
        $this->batchInsert(
            'type',
            ['title'],
            [
                ['Новости'],
                ['Статьи'],
                ['Законы'],
                ['Электронная подпись'],
                [''],
                ['Литература'],
                ['Услуги'],
                ['ФЗ-94'],
            ]
        );
    }

    public function down()
    {
        return true;
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
