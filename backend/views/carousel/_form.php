<?php

use dosamigos\tinymce\TinyMce;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\carousel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carousel-form">

    <?php \yii\bootstrap\Modal::begin()?>
    <?php \yii\bootstrap\Modal::end()?>

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'file_carousel')->widget(FileInput::className(),[
        'options'=>['accept'=>'image/*','multiple'=>false],
        'pluginOptions' => [
            'initialPreview'=> isset($model->file_carousel)? Yii::$app->urlManager->getBaseUrl().'/images/carousel/'.$model->file_carousel: false,
            'initialPreviewAsData'=>true,
            'initialCaption'=>$model->file_carousel,
            'initialPreviewConfig' => [
                ['caption' => $model->file_carousel],
            ],
            'overwriteInitial'=>true,
            'showUpload'=>false,
        ],
    ]) ?>
    <div class="clearfix"></div><br>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
