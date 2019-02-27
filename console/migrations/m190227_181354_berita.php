<?php

use yii\db\Schema;
use yii\db\Migration;

class m190227_181354_berita extends Migration
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
            '{{%berita}}',
            [
                'id_berita'=> $this->primaryKey(11),
                'judul_berita'=> $this->string(255)->notNull(),
                'inti_berita'=> $this->string(255)->null()->defaultValue(null),
                'isi_berita'=> $this->text()->null()->defaultValue(null),
                'gambar_berita'=> $this->string(255)->null()->defaultValue(null),
                'penerbit_berita'=> $this->integer(11)->null()->defaultValue(null),
                'created_at'=> $this->datetime()->null()->defaultValue(null),
                'updated_at'=> $this->datetime()->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('idx-berita','{{%berita}}',['judul_berita','penerbit_berita'],false);
        $this->createIndex('fk-berita-penerbit_berita','{{%berita}}',['penerbit_berita'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('idx-berita', '{{%berita}}');
        $this->dropIndex('fk-berita-penerbit_berita', '{{%berita}}');
        $this->dropTable('{{%berita}}');
    }
}
