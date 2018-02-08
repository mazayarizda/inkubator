<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Produk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_produk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'developer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi_produk')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fitur_produk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spesifikasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'added_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
