<?php

namespace common\models;

use backend\models\Admin;
use backend\models\Kategori;
use Yii;

/**
 * This is the model class for table "produk".
 *
 * @property int $id_produk
 * @property string $nama_produk
 * @property int $kategori_produk
 * @property string $developer
 * @property string $deskripsi_produk
 * @property string $fitur_produk
 * @property string $spesifikasi
 * @property int $harga
 * @property string $video
 * @property string $demo
 * @property string $source_code
 * @property string $manual_book
 * @property string $rancangan
 * @property int $status
 * @property int $added_by
 * @property string $created_at
 * @property string $updated_at
 * @property DetailOrder[] $detailOrders
 * @property DetailProduk[] $detailProduks
 * @property Admin $addedBy
 * @property Kategori $kategoriProduk
 * @property TagProduk[] $tagProduks
 */
class Produk extends \yii\db\ActiveRecord
{
	const STATUS_DELETED = 0;
	const STATUS_ACTIVE = 10;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_produk', 'developer'], 'required'],
            [['kategori_produk', 'harga', 'status', 'added_by'], 'integer'],
            [['deskripsi_produk','fitur_produk', 'spesifikasi'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama_produk', 'developer', 'video', 'source_code', 'demo', 'manual_book', 'rancangan'], 'string', 'max' => 255],
            [['added_by'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['added_by' => 'id']],
            [['kategori_produk'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['kategori_produk' => 'id_kategori']],
	        ['status', 'default', 'value' => self::STATUS_ACTIVE],
	        ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_produk' => 'Id Produk',
            'nama_produk' => 'Nama Produk',
            'kategori_produk' => 'Kategori Produk',
            'developer' => 'Developer',
            'deskripsi_produk' => 'Deskripsi Produk',
            'fitur_produk' => 'Fitur Produk',
            'spesifikasi' => 'Spesifikasi',
            'harga' => 'Harga',
            'video' => 'Video',
	        'source_code'=>'Source Code',
            'demo' => 'Demo',
            'manual_book' => 'Manual Book',
            'rancangan' => 'Rancangan',
            'status' => 'Status',
            'added_by' => 'Added By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailOrders()
    {
        return $this->hasMany(DetailOrder::className(), ['id_produk' => 'id_produk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailProduks()
    {
        return $this->hasMany(DetailProduk::className(), ['id_produk' => 'id_produk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddedBy()
    {
        return $this->hasOne(Admin::className(), ['id' => 'added_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategoriProduk()
    {
        return $this->hasOne(Kategori::className(), ['id_kategori' => 'kategori_produk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagProduks()
    {
        return $this->hasMany(TagProduk::className(), ['id_produk' => 'id_produk']);
    }
}
