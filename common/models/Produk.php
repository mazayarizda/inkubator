<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "produk".
 *
 * @property int $id_produk
 * @property string $nama_produk
 * @property string $developer
 * @property string $deskripsi_produk
 * @property string $fitur_produk
 * @property string $spesifikasi
 * @property int $harga
 * @property string $video
 * @property int $status
 * @property int $added_by
 * @property string $created_at
 * @property string $updated_at
 *
 * @property DetailProduk[] $detailProduks
 * @property Admin $addedBy
 * @property TagProduk[] $tagProduks
 */
class Produk extends \yii\db\ActiveRecord
{
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
            [['deskripsi_produk'], 'string'],
            [['harga', 'status', 'added_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama_produk', 'developer', 'fitur_produk', 'spesifikasi', 'video'], 'string', 'max' => 255],
            [['added_by'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['added_by' => 'id']],
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
            'developer' => 'Developer',
            'deskripsi_produk' => 'Deskripsi Produk',
            'fitur_produk' => 'Fitur Produk',
            'spesifikasi' => 'Spesifikasi',
            'harga' => 'Harga',
            'video' => 'Video',
            'status' => 'Status',
            'added_by' => 'Added By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
    public function getTagProduks()
    {
        return $this->hasMany(TagProduk::className(), ['id_produk' => 'id_produk']);
    }
}
