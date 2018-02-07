<?php

use yii\db\Migration;

/**
 * Class m180206_235708_inkubator
 */
class m180206_235708_inkubator extends Migration
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

        /*
         * ======================================== Table Preparation ================================================
         */

        //Drop table if exists
        $this->execute("DROP TABLE IF EXISTS `admin`;");
        $this->execute("DROP TABLE IF EXISTS `user`;");
        $this->execute("DROP TABLE IF EXISTS `produk`;");
        $this->execute("DROP TABLE IF EXISTS `detail_produk`;");
        $this->execute("DROP TABLE IF EXISTS `berita`;");
        $this->execute("DROP TABLE IF EXISTS `tag`;");
        $this->execute("DROP TABLE IF EXISTS `tag_produk`;");
        $this->execute("DROP TABLE IF EXISTS `tag_berita`;");




        /*
         * =============================== ALL TABLES ================================================
         */
        //Create tabel admin
        $this->createTable('admin',[
            'id'=> $this->primaryKey(),
            'username'=> $this->string()->notNull()->unique(),
            'email'=> $this->string()->notNull()->unique(),
            'nama'=> $this->string()->notNull(),
            'password_hash'=> $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'auth_key'=> $this->string(32)->notNull(),
            'avatar'=>$this->string(),
            'tempat_lahir'=> $this->string(),
            'tanggal_lahir'=> $this->date(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->date(),
            'updated_at' => $this->date(),
        ],$tableOptions);

        //Create Table User
        $this->createTable('user',[
            'id'=> $this->primaryKey(),
            'username'=> $this->string()->notNull()->unique(),
            'email'=> $this->string()->notNull()->unique(),
            'nama'=> $this->string()->notNull(),
            'password_hash'=> $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'auth_key'=> $this->string(32)->notNull(),
            'avatar'=>$this->string(),
            'tempat_lahir'=> $this->string(),
            'tanggal_lahir'=> $this->date(),
            'alamat'=> $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ],$tableOptions);

        //Create table produk
        $this->createTable('produk',[
            'id_produk'=>$this->primaryKey(),
            'nama_produk'=>$this->string()->notNull(),
            'developer'=>$this->string()->notNull(),
            'deskripsi_produk'=>$this->text(),
            'fitur_produk'=>$this->string(),
            'spesifikasi'=>$this->string(),
            'harga'=>$this->integer()->notNull()->defaultValue(0),
            'video'=>$this->string(),
            'status'=>$this->smallInteger()->notNull()->defaultValue(1),
            'created_at'=>$this->timestamp(),
            'updated_at'=>$this->timestamp(),

        ],$tableOptions);

        //create table detail produk
        $this->createTable('detail_produk',[
            'id_produk'=>$this->integer(),
            'gambar'=>$this->string()

        ],$tableOptions);

        //create table berita
        $this->createTable('berita',[
            'id_berita'=>$this->primaryKey(),
            'judul_berita'=>$this->string()->notNull(),
            'isi_berita'=>$this->text(),
            'gambar_berita'=>$this->string(),
            'penerbit_berita'=>$this->integer(),
        ],$tableOptions);

        //create table tag
        $this->createTable('tag',[
            'id_tag'=>$this->primaryKey(),
            'nama_tag'=>$this->string(),
            'created_at'=>$this->timestamp(),
            'updated_at'=>$this->timestamp(),
        ],$tableOptions);

        //create table tag produk
        $this->createTable('tag_produk',[
            'id_produk'=>$this->integer(),
            'id_tag'=>$this->integer(),
        ],$tableOptions);

        //create table tag berita
        $this->createTable('tag_berita',[
            'id_berita'=>$this->integer(),
            'id_tag'=>$this->integer(),
        ],$tableOptions);


        /*
         *  =================================== INDEX PREPARATION ==================================================
         */


        //create index for table admin
        $this->createIndex('idx-admin','admin',['username','nama','email']);

        //create index for table user
        $this->createIndex('idx-user','user',['username','nama','email']);

        //create index for table produk
        $this->createIndex('idx-produk','produk',['nama_produk','developer','harga']);

        //create index for table detail_produk
        $this->createIndex('idx-detail_produk','detail_produk',['id_produk','gambar']);

        //create index for table berita
        $this->createIndex('idx-berita','berita',['judul_berita','penerbit_berita']);

        //create index for table tag_produk
        $this->createIndex('idx-tag-produk','tag_produk',['id_produk','id_tag']);

        //create index for table tag_berita
        $this->createIndex('idx-tag-berita','tag_berita',['id_berita','id_tag']);


        /*
         *  ========================================== FOREIGN KEY PREPARATION =========================================
         */

        //foreign key tabel produk
        $this->addForeignKey('fk-produk-id_admin',
            'produk',
            'added_by',
            'admin',
            'id_admin',
            'NULL',
            'CASCADE');

        //foreign key tabel detail-produk
        $this->addForeignKey('fk-detail_produk-id_produk',
            'detail-produk',
            'id_produk',
            'produk',
            'id_produk',
            'CASCADE',
            'CASCADE');

        //foreign key tabel berita
        $this->addForeignKey('fk-berita-penerbit_berita',
            'berita',
            'penerbit_berita',
            'admin',
            'id_admin',
            'NULL',
            'CASCADE'
            );

        //foreign key table tag_produk
        //kolom id_produk
        $this->addForeignKey('fk-tag_produk-id_produk',
            'tag_produk',
            'id_produk',
            'produk',
            'id_produk',
            'CASCADE',
            'CASCADE'
            );

        //kolom id_tag
        $this->addForeignKey('fk-tag_produk-id_tag',
            'tag_produk',
            'id_tag',
            'tag',
            'id_tag',
            'CASCADE',
            'CASCADE');

        //foreign key table tag_berita
        //kolom id_berita
        $this->addForeignKey('fk-tag_berita-id_berita',
            'tag_berita',
            'id_berita',
            'berita',
            'id_berita',
            'CASCADE',
            'CASCADE'
        );

        //kolom id_tag
        $this->addForeignKey('fk-tag_berita-id_tag',
            'tag_berita',
            'id_tag',
            'tag',
            'id_tag',
            'CASCADE',
            'CASCADE');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        //drop foreign key
        $this->dropForeignKey('fk-produk-id_admin','produk');
        $this->dropForeignKey('fk-detail_produk-id_produk','detail_produk');
        $this->dropForeignKey('fk-berita-penerbit_berita','berita');
        $this->dropForeignKey('fk-tag_produk-id_produk','tag_produk');
        $this->dropForeignKey('fk-tag_produk-id_tag','tag_produk');
        $this->dropForeignKey('fk-tag_berita-id_berita','tag_berita');
        $this->dropForeignKey('fk-tag_berita-id_tag','tag_berita');

        //drop index
        $this->dropIndex('idx-admin','admin');
        $this->dropIndex('idx-user','user');
        $this->dropIndex('idx-produk','produk');
        $this->dropIndex('idx-detail_produk','detail_produk');
        $this->dropIndex('idx-berita','berita');
        $this->dropIndex('idx-tag_produk','tag_produk');
        $this->dropIndex('idx-tag_berita','tag_berita');

        //drop table
        $this->dropTable('admin');
        $this->dropTable('user');
        $this->dropTable('produk');
        $this->dropTable('detail_produk');
        $this->dropTable('berita');
        $this->dropTable('tag');
        $this->dropTable('tag_produk');
        $this->dropTable('tag_berita');
      //  echo "m180206_235708_inkubator cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180206_235708_inkubator cannot be reverted.\n";

        return false;
    }
    */
}
