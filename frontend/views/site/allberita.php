<?php
/**
 * Created by PhpStorm.
 * User: mazayarizda
 * Date: 04/04/2018
 * Time: 20:15
 */
use common\models\Berita;
use yii\helpers\Html;
?>

<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Berita</h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <ul class="w3_short">
                    <li><a href="<?php echo Yii::$app->getHomeUrl();?>site/index">Home</a><i>|</i></li>
                    <li>Berita</li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>

<div class="banner-bootom-w3-agileits">
    <div class="container">

        <div class="row">
            <?php
           $model = Berita::find()->orderBy('created_at DESC')->all();
            foreach($model as $db):
                ?>

                <div class="col-md-4 bb-grids bb-middle-agileits-w3layouts" style="margin-top: 25px">
                    <a href="<?=\yii\helpers\Url::toRoute(['site/berita','id'=>$db->id_berita])?>">
                        <div class="bb-left-agileits-w3layouts-inner grid">
                            <figure class="effect-roxy">
                                <?= Html::img(Yii::$app->urlManager->getBaseUrl().'/admin/images/berita/'.$db['gambar_berita'],['width' => '660px','height'=>'210px']); ?>

                                <figcaption>
                                    <h4 style="color: white"><span></span><?php echo $db->judul_berita?></h4>
                                    <p><?php echo $db->inti_berita?></p>
                                </figcaption>
                            </figure>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="clearfix"></div>
    </div>

</div>


