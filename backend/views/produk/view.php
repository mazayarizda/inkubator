<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Produk */

$this->title = $model->nama_produk;
$this->params['breadcrumbs'][] = ['label' => 'Produk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="produk-view">

                <h4 class="header-title m-t-0 m-b-30"><?= Html::encode($this->title) ?></h4>

                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id_produk], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id_produk], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id_produk',
                        'nama_produk',
                        'kategoriProduk.nama_kategori',
                        'developer',

                        ['attribute'=>'deskripsi_produk',
                            'format'=>'raw',
                            'value'=>function($model){
                                $a = \yii\helpers\HtmlPurifier::process($model->deskripsi_produk);
                                return $a;
                            }],
                        ['attribute'=>'fitur_produk',
                            'format'=>'raw',
                            'value'=>function($model){
                                $a = \yii\helpers\HtmlPurifier::process($model->fitur_produk);
                                return $a;
                            }],
                        ['attribute'=>'spesifikasi',
                            'format'=>'raw',
                            'value'=>function($model){
                                $a = \yii\helpers\HtmlPurifier::process($model->spesifikasi);
                                return $a;
                            }],
                        'harga',
                        'video',
                        'demo',
                        'manual_book',
                        'source_code',
                        'rancangan',
                        [
                                'attribute'=>'status',
                            'type'=>'raw',
                            'value'=>function($model){
                                if($model->status == 10) return 'Aktif';
                                else return 'Tidak Aktif';
                            }
                        ],
                        [
                                'attribute'=>'added_by',
                            'label'=>'Ditambahkan oleh',
                                'value'=>                      $model->addedBy->nama,

                        ],
                        'created_at:datetime',
                        'updated_at:datetime',
                    ],
                ]) ?>

            </div>
        </div>

    </div><!-- end col -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="produk-view">
                <h3 class="m-t-0 m-b-30"><?= Html::encode("Gambar Produk") ?> </h3>
                <div class="alert alert-primary">
                </div>
                <br>

                <div class="container">
<!--                    <pre>-->
<!--                    --><?php //print_r($gambar);?>
<!--                    </pre>-->
                    <?php
                        foreach($gambar as $g):
                    ?>
                    <?=Html::img(Yii::getAlias('@imgBackend/produk/'.$g['gambar']),['width'=>'75%','height'=>'75%','alt'=>'Gambar Produk'])?>

                    <?php endforeach;?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div><!-- end col -->
</div>
