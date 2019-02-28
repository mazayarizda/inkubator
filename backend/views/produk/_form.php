<?php

use kartik\file\FileInput;
use kartik\select2\Select2;
use dosamigos\tinymce\TinyMce;
use sjaakp\taggable\TagEditor;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\models\Kategori;


/* @var $this yii\web\View */
/* @var $produk common\models\Produk */
/* @var $detail_produk common\models\DetailProduk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-form">

    <?php \yii\bootstrap\Modal::begin()?>
    <?php \yii\bootstrap\Modal::end()?>
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($produk, 'nama_produk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($produk, 'kategori_produk')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Kategori::find()->all(),'id_kategori','nama_kategori'),
        'options' => ['placeholder' => 'Pilih Kategori'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($produk, 'developer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($produk, 'deskripsi_produk')->widget(TinyMce::className(), [
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

    <?= $form->field($produk, 'fitur_produk')->widget(TinyMce::className(), [
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

    <?= $form->field($produk, 'spesifikasi')->widget(TinyMce::className(), [
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

    <?= $form->field($produk, 'harga')->textInput() ?>
    <?= $form->field($produk, 'demo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($produk, 'video')->textInput(['maxlength' => true]) ?>
	<?php
	if(!$produk->isNewRecord){

//		$data = Yii::$app->db->createCommand('select * from produk where id_produk = '.$produk->id_produk)->queryAll();
//		$a = [];
//		$b = [];
//		for($i= 0; $i<count($data); $i++){
//			array_push($a,array(Yii::$app->basePath.'/web/upload/source_code/'.$data[$i]['source_code']));
//			array_push($b,array('caption'=>$data[$i]['source_code']));
//		}
//		var_dump(Yii::$app->urlManager->getBaseUrl().'/upload/source_code/'.$produk->source_code);

		echo $form->field($produk, 'source_code')->widget(FileInput::className(),[
			'options'=>['accept'=>'*','multiple'=>false],
			'pluginOptions' => [
				'initialPreview'=> $produk->source_code != null?Yii::$app->urlManager->getBaseUrl().'/upload/source_code/'.$produk->source_code: false,
				'initialPreviewConfig' =>[
				       ['caption'=> $produk->source_code,
                        'type'=>'other']
				],
				'previewFileType' => 'any',
				'initialCaption'=>isset($produk->source_code)? $produk->source_code: 'Tidak ada file dipilih',
				'initialPreviewAsData'=>true,
				'overwriteInitial'=>true,
				'showUpload'=>false,
				'showRemove'=>false,

			],
		]) ;

//		var_dump(Yii::$app->urlManager->getBaseUrl().'/upload/manual/'.$produk->manual_book);

        echo $form->field($produk, 'manual_book')->widget(FileInput::className(),[
            'options'=>['accept'=>'*','multiple'=>false],
            'pluginOptions' => [
                'initialPreview'=> $produk->manual_book != null? Yii::$app->urlManager->getBaseUrl().'/upload/manual/'.$produk->manual_book : false,
                'initialPreviewConfig' =>[
                       [ 'caption'=>$produk->manual_book,
                 'type' =>'pdf']
                ],
                'initialCaption'=>$produk->manual_book,
                'previewFileType' => 'any',
                'initialPreviewAsData'=>true,
                'overwriteInitial'=>true,
                'showUpload'=>false,


            ],
        ]) ;

//        var_dump(Yii::$app->urlManager->getBaseUrl().'/upload/rancangan/'.$produk->rancangan);
        echo $form->field($produk, 'rancangan')->widget(FileInput::className(),[
            'options'=>['accept'=>'*','multiple'=>false],
            'pluginOptions' => [
                'initialPreview'=>$produk->rancangan != null? Yii::$app->urlManager->getBaseUrl().'/upload/rancangan/'.$produk->rancangan: false,
                'initialPreviewConfig' =>[
//                        ['caption'=>$produk->rancangan]
////                        'type'=>'any'
                    ['caption'=>$produk->rancangan,
                        'type'=>'pdf']
                    ],
                'initialCaption'=>$produk->rancangan,
                'previewFileType' => 'any',
                'initialPreviewAsData'=>true,
                'overwriteInitial'=>true,
                'showUpload'=>false,

            ],
        ]) ;
	} else{
		echo  $form->field($produk, 'source_code')->widget(FileInput::className(),[
			'options'=>['accept'=>'*','multiple'=>false],
			'pluginOptions' => [
				'showUpload'=>false,
			],
		]) ;
        echo  $form->field($produk, 'manual_book')->widget(FileInput::className(),[
            'options'=>['accept'=>'*','multiple'=>true],
            'pluginOptions' => [
                'showUpload'=>false,

            ],
        ]) ;
        echo  $form->field($produk, 'rancangan')->widget(FileInput::className(),[
            'options'=>['accept'=>'*','multiple'=>true],
            'pluginOptions' => [
                'showUpload'=>true,

            ],
        ]) ;
	}
	?>

    <?php
    if(!$produk->isNewRecord){

        $data = Yii::$app->db->createCommand('select * from detail_produk where id_produk = '.$produk->id_produk)->queryAll();
        $a = [];
        $b = [];
        for($i= 0; $i<count($data); $i++){
            array_push($a,array(Yii::$app->urlManager->getBaseUrl().'/images/produk/'.$data[$i]['gambar']));
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
                'showRemove'=>false,

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
