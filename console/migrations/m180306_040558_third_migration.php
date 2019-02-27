<?php

use yii\db\Migration;

/**
 * Class m180306_040558_third_migration
 */
class m180306_040558_third_migration extends Migration
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


        //drop table if exist
        $this->execute("DROP TABLE IF EXISTS `profil`;");

        //create table order
        $this->createTable('profil',[
            'id_profil'=> $this->primaryKey(),
            'foto_profil'=> $this->string()->notNull(),
            'isi_profil'=> $this->text()->notNull(),
            'created_at'=> $this->dateTime(),
            'update_at'=> $this->dateTime(),
        ],$tableOptions);


        //add attribute job in user table
        $this->addColumn('produk','demo',$this->string(64)->after('video'));

        //add attibute instansi in user table
        $this->addColumn('produk','rancangan',$this->string()->after('demo'));

        //add atribute highlight in berita table
        $this->addColumn('produk','manual_book',$this->string()->after ('demo'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180306_040558_third_migration cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180306_040558_third_migration cannot be reverted.\n";

        return false;
    }
    */
}
