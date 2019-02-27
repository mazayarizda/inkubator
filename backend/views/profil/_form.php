<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use dosamigos\tinymce\TinyMce;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\profil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profil-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'foto_profil')->widget(FileInput::className(),[
        'options'=>['accept'=>'image/*','multiple'=>false],
        'pluginOptions' => [
            'initialPreview'=> isset($model->foto_profil)? Yii::$app->urlManager->getBaseUrl().'/images/profil/'.$model->foto_profil: false,
            'initialPreviewAsData'=>true,
            'initialCaption'=>$model->foto_profil,
            'initialPreviewConfig' => [
                ['caption' => $model->foto_profil],
            ],
            'overwriteInitial'=>true,
            'showUpload'=>false,

        ],
    ]) ?>

    <?= $form->field($model, 'isi_profil')->widget(TinyMce::className(), [
        'options' => ['rows' => 8 ],
        'language' => 'en',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]);?>

    <?= $form->field($model, 'nama_app')->textInput() ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'hp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
