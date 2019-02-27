<?php

use yii\db\Migration;

/**
 * Class m180227_151228_second_migration
 */
class m180227_151228_second_migration extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $tableOptions = null;
        if($this->db->driverName == 'mysql'){
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }


        //drop table if exist
        $this->execute("DROP TABLE IF EXISTS `order`;");
        $this->execute("DROP TABLE IF EXISTS `detail_order`;");
        $this->execute("DROP TABLE IF EXISTS `carousel`;");
        $this->execute("DROP TABLE IF EXISTS `kategori`;");


        //create table order
        $this->createTable('order',[
            'id_order'=> $this->primaryKey(),
            'id_produk'=> $this->integer(),
            'id_user'=> $this->integer(),
            'tgl_order'=> $this->dateTime()->notNull(),
            'total'=> $this->string()->notNull(),
        ],$tableOptions);

        //create table detail_order
        $this->createTable('detail_order',[
            'id_detail_order'=> $this->primaryKey(),
            'id_produk'=> $this->integer(),
            'id_order'=> $this->integer(),
        ],$tableOptions);

        //create table carrousel
        $this->createTable('carousel',[
            'id_carousel'=> $this->primaryKey(),
            'file_carousel'=> $this->string()->notNull(),
            'created_at'=> $this->dateTime()->notNull(),
            'updated_at'=> $this->dateTime()->notNull(),
        ],$tableOptions);

        //create table kategori
        $this->createTable('kategori',[
            'id_kategori'=> $this->primaryKey(),
            'nama_kategori'=> $this->string()->notNull(),
            'created_at'=> $this->dateTime()->notNull(),
            'updated_at'=> $this->dateTime()->notNull(),
        ],$tableOptions);

        //add attribute job in user table
        $this->addColumn('user','job',$this->string(64)->after('alamat'));

        //add attibute instansi in user table
        $this->addColumn('user','instansi',$this->string()->after('job'));

        //add atribute highlight in berita table
        $this->addColumn('berita','inti_berita',$this->string()->after ('judul_berita'));

        //add atribute kategori produk in produk table
        $this->addColumn('produk','kategori_produk',$this->integer()->after ('nama_produk'));

        // add index table order
        $this->createIndex('idx-order','order',['id_order','tgl_order']);

        // add index table detail order
        $this->createIndex('idx-detail_order','detail_order',['id_detail_order']);


        $this->addForeignKey('fk-produk-id_kategori',
            'produk',
            'kategori_produk',
            'kategori',
            'id_kategori',
            'CASCADE',
            'CASCADE');

        $this->addForeignKey('fk-order-id_produk',
            'order',
            'id_produk',
            'produk',
            'id_produk',
            'CASCADE',
            'CASCADE');

        $this->addForeignKey('fk-order-id',
            'order',
            'id_user',
            'user',
            'id',
            'CASCADE',
            'CASCADE');

        //add foreign key detail_order
        $this->addForeignKey('fk-detail_order-id_order',
            'detail_order',
            'id_order',
            'order',
            'id_order',
            'CASCADE',
            'CASCADE');

        $this->addForeignKey('fk-detail_order-id_produk',
            'detail_order',
            'id_produk',
            'produk',
            'id_produk',
            'CASCADE',
            'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180227_151228_second_migration cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180227_151228_second_migration cannot be reverted.\n";

        return false;
    }
    */
}
