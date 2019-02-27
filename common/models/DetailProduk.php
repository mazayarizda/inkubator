<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detail_produk".
 *
 * @property int $id_produk
 * @property string $gambar
 *
 * @property Produk $produk
 */
class DetailProduk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail_produk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_produk'], 'integer'],
            [['gambar'], 'file','maxFiles' => 10,'skipOnEmpty' => true],
            [['id_produk'], 'exist', 'skipOnError' => true, 'targetClass' => Produk::className(), 'targetAttribute' => ['id_produk' => 'id_produk']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_produk' => 'Id Produk',
            'gambar' => 'Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk()
    {
        return $this->hasOne(Produk::className(), ['id_produk' => 'id_produk']);
    }
}
