<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\profil */

$this->title = $model->nama_app;
$this->params['breadcrumbs'][] = ['label' => 'Profil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if(Yii::$app->session->hasFlash('success'))
{
    Yii::$app->session->getFlash('success');
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="profil-view">

                <h4 class="header-title m-t-0 m-b-30"><?= Html::encode($this->title) ?></h4>

                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id_profil], ['class' => 'btn btn-primary']) ?>
                </p>
                <?php
                yii\bootstrap\Modal::begin(['id' =>'modal']);
                yii\bootstrap\Modal::end();
                ?>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id_profil',
                        [
                            'attribute'=>'foto_profil',
                            'format'=>'raw',
                            'value'=> function($model) {
                                $modal = '
                                    <button class="btn btn-default waves-effect waves-light" data-toggle="modal" data-target="#photo-' . $model->id_profil . '"><img src="/admin/images/profil/' . $model->foto_profil . '" width="30px" height="30px"></button>
                                    
                                    <div id="photo-' . $model->id_profil . '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="#modal-' . $model->id_profil . '" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                  
                                                </div>
                                                <div class="modal-body">
                                                   <img class="center-block" src="/admin/images/profil/' . $model->foto_profil . '"  width="75%" height="75%"/>
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
                        [
                                'attribute'=>'isi_profil',
                            'format'=>'raw',
                            'value'=>function($model){
                                $a = \yii\helpers\HtmlPurifier::process($model->isi_profil);
                                return $a;
                            }
                        ],
                        'nama_app',
                        'alamat:ntext',
                        'email',
                        'hp',
                        'created_at:datetime',
                        'update_at:datetime',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
