<?php

namespace common\models;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsTrait;
use sjaakp\taggable\TaggableBehavior;
use Yii;
use backend\models\Admin;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

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

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produk';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => function($event) {

                    return new Expression('NOW()');
                }
            ],
            'taggable'=>[
                'class'=> TaggableBehavior::className(),
                'tagClass' => Tag::className(),
                'junctionTable' => 'tag_produk',
                'nameAttribute' => 'nama_tag',
                'modelKeyAttribute' => 'id_produk',
                'tagKeyAttribute' => 'id_tag',
            ],
            'saveRelations'=>[
              'class'=> SaveRelationsBehavior::className(),
                'relations' => [
                  'produk',
                  'detail_produk'
                ],
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL
        ];
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
            [['editorTags'], 'safe'],
            [['nama_produk', 'developer', 'fitur_produk', 'spesifikasi', 'video'], 'string', 'max' => 255],
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
            'editorTags' => 'Tag'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailProduks()
    {
        return $this->hasMany(DetailProduk::className(), ['id_produk' => 'id_produk'])->
        viaTable('detail_produk',['id_produk'=>'id_produk']);
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
