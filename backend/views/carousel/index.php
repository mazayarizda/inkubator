<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\CarouselSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carousels';
$this->params['breadcrumbs'][] = $this->title;
if(Yii::$app->session->hasFlash('success'))
{
    Yii::$app->session->getFlash('success');
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="carousel-index">
                <h4 class="header-title m-t-0 m-b-30"><?= Html::encode($this->title) ?></h4>
                <?php Pjax::begin(); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Create Carousel', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?php
                yii\bootstrap\Modal::begin(['id' =>'modal']);
                yii\bootstrap\Modal::end();
                ?>

                <?= \fedemotta\datatables\DataTables::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn','header' => 'No'],

                       // 'id_carousel',
                        [
                        'attribute'=>'file_carousel',
                            'format'=>'raw',
                            'value'=> function($model) {
                                $modal = '
                                    <button class="btn btn-default waves-effect waves-light" data-toggle="modal" data-target="#photo-' . $model->id_carousel . '"><img src="/admin/images/carousel/' . $model->file_carousel . '" width="30px" height="30px"></button>
                                    
                                    <div id="photo-' . $model->id_carousel . '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="#modal-' . $model->id_carousel . '" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="modal-' . $model->id_carousel . '"></h4>
                                                </div>
                                                <div class="modal-body">
                                                   <img class="center-block" src="/admin/images/carousel/' . $model->file_carousel . '"  width="75%" height="75%"/>
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
                        'created_at:datetime',
                        'updated_at:datetime',

                        ['class' => 'yii\grid\ActionColumn','header' => 'Aksi'],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
                </div>
            </div>
    </div>
</div>