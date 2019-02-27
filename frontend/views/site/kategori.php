<?php
use backend\models\Kategori;
use common\models\Produk;
use common\models\DetailProduk;
use yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: mazayarizda
 * Date: 27/02/2018
 * Time: 11:37
 */
/* @var $kategoris array|\backend\models\Kategori[]|\common\models\Produk[]|\yii\db\ActiveRecord[] */
/* @var $this \yii\web\View */
/* @var $produks array|\backend\models\Kategori[]|\common\models\Produk[]|\yii\db\ActiveRecord[] */
/* @var $kat null|static */

?>


<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3><?= isset($kat)? \yii\helpers\Html::encode($kat->nama_kategori): "Semua Produk"?></span></h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href=<?=Yii::$app->urlManager->createUrl(['site/index'])?>>Home</a><i>|</i></li>
                    <li><?= isset($kat)?  $kat->nama_kategori : "Semua Produk"?></li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <!-- mens -->
            <div class="row">
                <div class="col-md-3">
                    <div class="css-treeview">
                        <h4>Kategori</h4>
                        <ul class="tree-list-pad">
                            <li><a href="<?=\yii\helpers\Url::toRoute(['site/kategori','id'=>0])?>"> <i class="fa fa-long-arrow-right" aria-hidden="true" ><span>Semua Produk</span></i></a></li>
                            <?php
                            
                            foreach ($kategoris as $kategori):
                                ?>
                                <li><a href="<?=\yii\helpers\Url::toRoute(['site/kategori','id'=>$kategori->id_kategori])?>"> <i class="fa fa-long-arrow-right" aria-hidden="true" ><span><?=$kategori->nama_kategori?></span></i></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-sm-9">
                     <?php
            $id = 0;
            foreach($produks as $db):
              
                $modelpd=DetailProduk::findOne(['id_produk'=> $db->id_produk]);
                ?>

                <div class="col-md-6 bb-grids bb-middle-agileits-w3layouts" style="margin-top: 25px">
                    <a href="<?=\yii\helpers\Url::toRoute(['site/produk','id'=>$db->id_produk])?>">
                        <div class="bb-left-agileits-w3layouts-inner grid">
                            <figure class="effect-roxy">
                                <?= Html::img(Yii::$app->urlManager->getBaseUrl().'/admin/images/produk/'.$modelpd->gambar,['width' => '660px','height'=>'210px']); ?>

                                <figcaption>
                                    <h4 style="color: white"><?php echo $db->nama_produk?></h4>
                                    <p><?= Yii::$app->formatter->asCurrency($db->harga)?></p>
                                </figcaption>
                            </figure>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>