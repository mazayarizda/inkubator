<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Berita */

$this->title = $model->id_berita;
$this->params['breadcrumbs'][] = ['label' => 'Berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="berita-view">

                <h4 class="header-title m-t-0 m-b-30"><?= Html::encode($this->title) ?></h4>

                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id_berita], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id_berita], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
                <?php
                yii\bootstrap\Modal::begin(['id' =>'modal']);
                yii\bootstrap\Modal::end();
                ?>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id_berita',
                        'judul_berita',
                        'isi_berita:ntext',
                        [
                            'attribute'=>'gambar_berita',
                            'format'=>'raw',
                            'value'=> function($model) {
                                $modal = '
                                    <button class="btn btn-default waves-effect waves-light" data-toggle="modal" data-target="#photo-' . $model->id_berita . '"><img src="/inkubator/backend/web/images/' . $model->gambar_berita . '" width="30px" height="30px"></button>
                                    
                                    <div id="photo-' . $model->id_berita . '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="#modal-' . $model->id_berita . '" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="modal-' . $model->id_berita . '">' . $model->judul_berita . '</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <img class="center-block" src="/inkubator/backend/web/images/' . $model->gambar_berita . '"  width="75%" height="75%"/>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                </div>
                                            </div><!— /.modal-content —>
                                        </div><!— /.modal-dialog —>
                                    </div><!— /.modal —>
                                ';
                                return $modal;
                            }
                        ],
                        'penerbit_berita',
                    ],
                ]) ?>

            </div>
        </div>

    </div><!-- end col -->
</div>


