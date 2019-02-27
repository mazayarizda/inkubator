<?php
/**
 * Created by PhpStorm.
 * User: mazayarizda
 * Date: 24/01/2018
 * Time: 17:16
 */
use backend\models\Berita;
use common\models\Produk;
use common\models\DetailProduk;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Selamat Datang di TopApp.id';
?>

<!-- /new_arrivals -->
<div class="new_arrivals_agile_w3ls_info">
    <div class="container">
        <h3 class="wthree_text_info">New <span>Product</span></h3>
            <div class="resp-tabs-container">
                <!--/tab_one-->
              <div class="row">
            <?php
            $id = 0;
            foreach($produk as $db):
                $modelpd=DetailProduk::findOne(['id_produk'=> $db->id_produk]);
                ?>

                <div class="col-md-4 bb-grids bb-middle-agileits-w3layouts" style="margin-top: 25px">
                    <a href="<?=\yii\helpers\Url::toRoute(['site/produk','id'=>$db->id_produk])?>">
                        <div class="bb-left-agileits-w3layouts-inner grid">
                            <figure class="effect-roxy">
                                <?= Html::img(Yii::getAlias('@imgBackend/produk/'.$modelpd->gambar),['width' => '660px','height'=>'210px']); ?>

                                <figcaption>
                                    <h4 style="color: white"><?php echo $db->nama_produk?></h4>
                                
                                </figcaption>
                            </figure>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
            </div>
            <div class="row">
            <div class="md-col-4 pull-right">
                <div class="tree-list-pad">
                    <a href="<?php echo Yii::$app->getHomeUrl()?>site/kategori/0"><h4 class="text-default">Produk Lainnya <i class="fa fa-arrow-right"></i></h4></a>
                </div>
            </div>
        </div>
        </div>
         
</div>
<!-- //new_arrivals -->
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <h3 class="wthree_text_info">Berita</h3>

        <div class="row">
        <?php
        $id = 0;
        foreach($berita as $db):
        ?>

        <div class="col-md-4 bb-grids bb-middle-agileits-w3layouts" style="margin-top: 25px">
            <a href="<?=\yii\helpers\Url::toRoute(['site/berita','id'=>$db->id_berita])?>">
                <div class="bb-left-agileits-w3layouts-inner grid">
                    <figure class="effect-roxy">
                        <?= Html::img(Yii::getAlias('@imgBackend/berita/'.$db['gambar_berita']),['width' => '660px','height'=>'210px']); ?>

                        <figcaption>
                            <h4 style="color: white"><?php echo $db->judul_berita?></h4>
                            <p><?php echo $db->inti_berita?></p>
                        </figcaption>
                    </figure>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="md-col-4 pull-right">
                <div class="tree-list-pad">
                    <a href="<?php echo Yii::$app->getHomeUrl()?>site/allberita"><h4 class="text-default">Selengkapnya <i class="fa fa-arrow-right"></i></h4></a>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- /we-offer -->
<!--<div class="sale-w3ls">-->
<!--    <div class="container">-->
<!--        <h6>Menuju World Class University</h6>-->
<!--    </div>-->
<!--</div>-->

