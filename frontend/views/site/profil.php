<?php
use backend\models\Berita;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/**
 * Created by PhpStorm.
 * User: mazayarizda
 * Date: 05/04/2018
 * Time: 17:02
 */

$this->title = 'Profil';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="blog-details-page">
    <div class="thm-container">
        <div class="row">
            <div class="col-md-12">
                <div class="single-blog-details-content">
                    <div class="featured-img-box">
                        <?= Html::img(Yii::getAlias('@imgBackend/profil/'.$model->foto_profil),['alt'=>'Gambar profil','height'=>600, 'width'=>770])?>
                    </div><!-- /.img-box -->
                    <div class="text-box">
                        <?=$model->isi_profil?>
                    </div><!-- /.text-box -->

                </div><!-- /.single-blog-details-content -->
            </div><!-- /.col-md-8 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.blog-details-page -->


