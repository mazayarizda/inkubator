<?php

use yii\db\Schema;
use yii\db\Migration;

class m190227_181509_tag extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%tag}}',
            [
                'id'=> $this->primaryKey(11),
                'nama_tag'=> $this->string(255)->null()->defaultValue(null),
                'count'=> $this->integer(11)->null()->defaultValue(null),
                'created_at'=> $this->datetime()->null()->defaultValue(null),
                'updated_at'=> $this->datetime()->null()->defaultValue(null),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%tag}}');
    }
}
