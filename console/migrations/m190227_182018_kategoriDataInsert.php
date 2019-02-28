<?php

use yii\db\Schema;
use yii\db\Migration;

class m190227_182018_kategoriDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%kategori}}',
                           ["id_kategori", "nama_kategori", "created_at", "updated_at"],
                            [
    [
        'id_kategori' => '1',
        'nama_kategori' => 'Augmented Reality',
        'created_at' => '2018-03-06 00:00:00',
        'updated_at' => '2018-04-03 11:51:06',
    ],
    [
        'id_kategori' => '3',
        'nama_kategori' => 'Android',
        'created_at' => '2018-03-19 12:45:15',
        'updated_at' => '2018-04-16 04:41:07',
    ],
    [
        'id_kategori' => '4',
        'nama_kategori' => 'Booking Apps',
        'created_at' => '2018-03-19 01:30:45',
        'updated_at' => '2018-04-03 11:52:08',
    ],
    [
        'id_kategori' => '5',
        'nama_kategori' => 'Games',
        'created_at' => '2018-03-19 02:46:35',
        'updated_at' => '2018-04-03 11:52:50',
    ],
    [
        'id_kategori' => '6',
        'nama_kategori' => 'LBS',
        'created_at' => '2018-03-19 02:57:51',
        'updated_at' => '2018-04-03 11:53:34',
    ],
    [
        'id_kategori' => '7',
        'nama_kategori' => 'Smart Apps',
        'created_at' => '2018-05-08 00:00:00',
        'updated_at' => '2018-05-09 00:00:00',
    ],
    [
        'id_kategori' => '8',
        'nama_kategori' => 'Aplikasi Web',
        'created_at' => '2018-05-08 00:00:00',
        'updated_at' => '2018-05-09 00:00:00',
    ],
    [
        'id_kategori' => '9',
        'nama_kategori' => 'Islami',
        'created_at' => '2018-05-25 05:33:22',
        'updated_at' => '2018-05-25 05:33:22',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%kategori}} CASCADE');
    }
}
