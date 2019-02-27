<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\carousel */

$this->title = 'Update Carousel';
$this->params['breadcrumbs'][] = ['label' => 'Carousels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_carousel, 'url' => ['view', 'id' => $model->id_carousel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="carousel-update">

             <h4 class="header-title m-t-0 m-b-30"><?= Html::encode($this->title) ?></h4>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
            </div>
        </div>
    </div>
</div>
