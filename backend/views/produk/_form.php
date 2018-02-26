<?php

use kartik\file\FileInput;
use kartik\select2\Select2;
use sjaakp\taggable\TagEditor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $produk common\models\Produk */
/* @var $detail_produk common\models\DetailProduk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-form">

    <?php \yii\bootstrap\Modal::begin()?>
    <?php \yii\bootstrap\Modal::end()?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($produk, 'nama_produk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($produk, 'developer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($produk, 'editorTags')->widget(TagEditor::className(), [
        'tagEditorOptions' => [
            'autocomplete' => [
                'source' => Url::toRoute(['tag/suggest'])
            ],

        ]
    ]) ?>

    <?= $form->field($produk, 'deskripsi_produk')->textarea(['rows' => 6]) ?>

    <?= $form->field($produk, 'fitur_produk')->textarea(['rows' => 6]) ?>

    <?= $form->field($produk, 'spesifikasi')->textarea(['rows' => 6]) ?>

    <?= $form->field($produk, 'harga')->textInput() ?>


    <?= $form->field($produk, 'video')->textInput(['maxlength' => true]) ?>
    <?php
    if(!$produk->isNewRecord){

        $data = Yii::$app->db->createCommand('select * from detail_produk where id_produk = '.$produk->id_produk)->queryAll();
        $a = [];
        $b = [];
        for($i= 0; $i<count($data); $i++){
            array_push($a,array('/inkubator/backend/web/images/produk/'.$data[$i]['gambar']));
            array_push($b,array('caption'=>$data[$i]['gambar']));
        }

        echo $form->field($detail_produk, 'gambar[]')->widget(FileInput::className(),[
            'options'=>['accept'=>'image/*','multiple'=>true],
            'pluginOptions' => [
                'initialPreview'=>$a,
                'initialPreviewConfig' =>$b,
                'previewFileType' => 'image',
                'initialPreviewAsData'=>true,
                'overwriteInitial'=>true,
                'showUpload'=>false,

            ],
        ]) ;
        $id = [
                ['id'=>0,'nama'=>'Tidak Aktif'],
                ['id'=>10,'nama'=>'Aktif']
        ];
        $data = \yii\helpers\ArrayHelper::map($id,'id','nama');
        echo $form->field($produk, 'status')->widget(Select2::className(),[
           'data' =>$data

            ]);
    } else{
      echo  $form->field($detail_produk, 'gambar[]')->widget(FileInput::className(),[
            'options'=>['accept'=>'image/*','multiple'=>true],
            'pluginOptions' => [
                'showUpload'=>false,

            ],
        ]) ;
    }
    ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
