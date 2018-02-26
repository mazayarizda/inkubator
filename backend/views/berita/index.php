    <?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\BeritaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berita';
$this->params['breadcrumbs'][] = $this->title;
if(Yii::$app->session->hasFlash('success'))
    {
        Yii::$app->session->getFlash('success');
    }
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="berita-index">

                <h4 class="header-title m-t-0 m-b-30"><?= Html::encode($this->title) ?></h4>
                <?php Pjax::begin(); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Create Berita', ['create'], ['class' => 'btn btn-success']) ?>
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

                        //'id_berita',
                        'judul_berita',
                        //'isi_berita:ntext',
                        [
                            'attribute'=>'gambar_berita',
                            'format'=>'raw',
                            'value'=> function($model) {
                                $modal = '
                                    <button class="btn btn-default waves-effect waves-light" data-toggle="modal" data-target="#photo-' . $model->id_berita . '"><img src="/inkubator/backend/web/images/berita/' . $model->gambar_berita . '" width="30px" height="30px"></button>
                                    
                                    <div id="photo-' . $model->id_berita . '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="#modal-' . $model->id_berita . '" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="modal-' . $model->id_berita . '">' . $model->judul_berita . '</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <img class="center-block" src="/inkubator/backend/web/images/berita/' . $model->gambar_berita . '"  width="75%" height="75%"/>
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
                        //'penerbit_berita',
                        'created_at:datetime',

                        ['class' => 'yii\grid\ActionColumn','header' => 'Aksi'],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>

    </div><!-- end col -->
</div>
