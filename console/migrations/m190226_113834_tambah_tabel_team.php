<?php

use yii\db\Migration;

/**
 * Class m190226_113834_tambah_tabel_team
 */
class m190226_113834_tambah_tabel_team extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if($this->db->driverName == 'mysql'){
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('team',[
            'id'=>$this->primaryKey(),
            'nama_lengkap'=>$this->string(50),
            'jabatan'=>$this->string(),
            'foto'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ],$tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190226_113834_tambah_tabel_team cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190226_113834_tambah_tabel_team cannot be reverted.\n";

        return false;
    }
    */
}
