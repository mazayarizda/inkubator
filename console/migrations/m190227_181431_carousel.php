<?php

use yii\db\Schema;
use yii\db\Migration;

class m190227_181431_carousel extends Migration
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
            '{{%carousel}}',
            [
                'id_carousel'=> $this->primaryKey(11),
                'file_carousel'=> $this->string(255)->notNull(),
                'created_at'=> $this->datetime()->notNull(),
                'updated_at'=> $this->datetime()->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%carousel}}');
    }
}
