<?php

use yii\db\Schema;
use yii\db\Migration;

class m190227_182045_tagDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%tag}}',
                           ["id", "nama_tag", "count", "created_at", "updated_at"],
                            [
    [
        'id' => '7',
        'nama_tag' => 'android',
        'count' => null,
        'created_at' => '2018-04-16 17:05:14',
        'updated_at' => '2018-04-25 23:30:40',
    ],
    [
        'id' => '8',
        'nama_tag' => 'facebook',
        'count' => null,
        'created_at' => '2018-04-16 23:03:17',
        'updated_at' => '2018-04-16 23:03:17',
    ],
    [
        'id' => '9',
        'nama_tag' => 'new',
        'count' => null,
        'created_at' => '2018-04-25 03:13:51',
        'updated_at' => '2018-04-25 03:13:51',
    ],
    [
        'id' => '10',
        'nama_tag' => 'ubuntu',
        'count' => null,
        'created_at' => '2018-04-25 03:48:34',
        'updated_at' => '2018-04-25 03:48:34',
    ],
    [
        'id' => '11',
        'nama_tag' => 'kernel',
        'count' => null,
        'created_at' => '2018-04-25 23:26:54',
        'updated_at' => '2018-04-25 23:26:54',
    ],
    [
        'id' => '12',
        'nama_tag' => 'reboot',
        'count' => null,
        'created_at' => '2018-04-25 23:26:54',
        'updated_at' => '2018-04-25 23:26:54',
    ],
    [
        'id' => '13',
        'nama_tag' => 'acer',
        'count' => null,
        'created_at' => '2018-04-26 09:58:14',
        'updated_at' => '2018-04-26 09:58:14',
    ],
    [
        'id' => '14',
        'nama_tag' => 'film',
        'count' => null,
        'created_at' => '2018-04-26 09:58:14',
        'updated_at' => '2018-04-26 09:58:14',
    ],
    [
        'id' => '15',
        'nama_tag' => 'war',
        'count' => null,
        'created_at' => '2018-04-26 09:58:14',
        'updated_at' => '2018-04-26 09:58:14',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%tag}} CASCADE');
    }
}
