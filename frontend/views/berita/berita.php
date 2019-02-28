<?php
use backend\models\Berita;
use yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: mazayarizda
 * Date: 05/04/2018
 * Time: 17:02
 */
?>

<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3><?=\yii\helpers\Html::encode($berita->judul_berita)?></h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="<?php echo Yii::$app->getHomeUrl();?>site/index">Home</a><i>|</i></li>
                    <li>Berita</li>
                    <li><?= $berita-> judul_berita?></li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>
<!-- /banner_bottom_agile_info -->
    <div class="banner_bottom_agile_info">
        <div class="container">
            <div class="agile_ab_w3ls_info">
                <div class="col-md-6 ab_pic_w3ls">
                    <div class="img-responsive">
                        <?= Html::img(Yii::$app->urlManager->getBaseUrl().'/admin/images/berita/'.$berita->gambar_berita,['width' => '500px','height'=>'286px']); ?>
                    </div>
                </div>
                <div class="col-md-6 ab_pic_w3ls_text_info">
                    <h5><?= $berita-> judul_berita?></h5>

                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-4 ">
                            <h6><?=$berita->getPenerbitBerita()->one()->nama?></h6>
                        </div>
                        <div class="col-md-4">
                            <h6><?= $berita-> created_at?></h6>
                        </div>
                        <div class="col-md-4">
                            <h6>Tags: <?=$berita->tagLinks?></h6>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
	                        <?php echo $berita->isi_berita?>
                        </div>
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

