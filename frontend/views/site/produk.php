<?php
/**
 * Created by PhpStorm.
 * User: mazayarizda
 * Date: 22/03/2018
 * Time: 12:15
 */?>
<div class="page-head_agile_info_w3l">
    <div class="container">

        <h3><?= \yii\helpers\Html::encode($produk->nama_produk)?></h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="<?=Yii::$app->urlManager->createUrl(['site/index'])?>">Home</a><i>|</i></li>
                    <li><?= $produk-> nama_produk?></li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <div class="col-md-4 single-right-left ">
            <div class="grid images_3_of_2">
                <div class="flexslider">
                    <ul class="slides">

                        <?php
                        foreach ($gambar as $gambar_produk):
                        ?>
    <li data-thumb="<?=Yii::$app->urlManager->getBaseUrl().'/admin/images/produk/'?><?=$gambar_produk->gambar?>">
  <div class="thumb-image">
        <?= \yii\helpers\Html::img(Yii::$app->urlManager->getBaseUrl().'/admin/images/produk/'.$gambar_produk->gambar,['data-imagezoom'=>'true', 'class'=>'img-responsive']);?>
       </div>
    </li>
<?php endforeach;?>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-8 single-right-left simpleCart_shelfItem">
            <h3><?=$produk->nama_produk?></h3><br>
            <h4>Developer: <span><b><?=$produk->developer?></b></span></h4>
            <p><span class="item_price">Untuk harga bisa diketahui melalui <a href="https://chat.whatsapp.com/FkJkah3OaXVAKKVXDV1Py2"><img src="http://pngimg.com/uploads/whatsapp/whatsapp_PNG21.png" widht="30" height="30"/> WhatsApp</a> </span> </p>
            <div class="row">
                <div class="col-md-3">
                    <?= \yii\helpers\Html::a('Demo','http://'.$produk->demo,['class'=>' btn btn-warning col-md-12','target'=>'_blank'])?>
                </div>
                <div class="col-md-3">
                    <?= \yii\helpers\Html::a('Manual',Yii::$app->urlManager->getBaseUrl().'/admin/upload/manual/'.$produk->manual_book,['class'=>' btn btn-primary col-md-12','target'=>'_blank'])?>
                </div>
                <div class="col-md-3">
                    <?= \yii\helpers\Html::a('Rancangan',Yii::$app->urlManager->getBaseUrl().'/admin/upload/rancangan/'.$produk->rancangan,['class'=>' btn btn-info col-md-12','target'=>'_blank'])?>
                </div>
                <div class="col-md-3">
		            <?= \yii\helpers\Html::a('Beli',\yii\helpers\Url::to("https://chat.whatsapp.com/FkJkah3OaXVAKKVXDV1Py2"),['class'=>' btn btn-success col-md-12','target'=>'_blank'])?>
                </div>
            </div>

            <br>
            <br>
            <div class="clearfix"></div>
            <div class="occasion-cart">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <iframe width="420" height="315"
                                    src="https://www.youtube.com/embed/<?= $produk->video?>">
                            </iframe>
                        </div>
                    </div>
                </div>


            </div>


        </div>


        <div class="clearfix"> </div>
        <!-- /new_arrivals -->
        <div class="responsive_tabs_agileits">
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <li>Description</li>
                    <li>Fitur</li>
                    <li>Spesifikasi</li>
                </ul>
                <div class="resp-tabs-container">
                    <!--/tab_one-->
                    <div class="tab1">
                        <div class="single_page_agile_its_w3ls">
                            <h6>Deskripsi Produk: <?= $produk->nama_produk?></h6>
                            <?= $produk->deskripsi_produk?>
                        </div>
                    </div>
                    <!--//tab_one-->
                    <div class="tab2">
                            <div class="single_page_agile_its_w3ls">
                                <h6>Fitur Produk : <?= $produk-> nama_produk?></h6>
                                <?= $produk->fitur_produk?>
                               </div>
                    </div>
                    <div class="tab3">
                        <div class="single_page_agile_its_w3ls">
                            <h6>Spesifikasi Produk : <?= $produk-> nama_produk?></h6>
                            <?= $produk->spesifikasi?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //new_arrivals -->
        <!--/slider_owl-->

<!--        <div class="w3_agile_latest_arrivals">-->
<!--            <h3 class="wthree_text_info">Featured <span>Arrivals</span></h3>-->
<!--            <div class="col-md-3 product-men single">-->
<!--                <div class="men-pro-item simpleCart_shelfItem">-->
<!--                    <div class="men-thumb-item">-->
<!--                        <img src="--><!--images/w2.jpg" alt="" class="pro-image-front">-->
<!--                        <img src="--><!--images/w2.jpg" alt="" class="pro-image-back">-->
<!--                        <div class="men-cart-pro">-->
<!--                            <div class="inner-men-cart-pro">-->
<!--                                <a href="single.html" class="link-product-add-cart">Quick View</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <span class="product-new-top">New</span>-->
<!---->
<!--                    </div>-->
<!--                    <div class="item-info-product ">-->
<!--                        <h4><a href="single.html">Sleeveless Solid Blue Top</a></h4>-->
<!--                        <div class="info-product-price">-->
<!--                            <span class="item_price">$140.99</span>-->
<!--                            <del>$189.71</del>-->
<!--                        </div>-->
<!--                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">-->
<!--                            <form action="#" method="post">-->
<!--                                <fieldset>-->
<!--                                    <input type="hidden" name="cmd" value="_cart">-->
<!--                                    <input type="hidden" name="add" value="1">-->
<!--                                    <input type="hidden" name="business" value=" ">-->
<!--                                    <input type="hidden" name="item_name" value="Sleeveless Solid Blue Top">-->
<!--                                    <input type="hidden" name="amount" value="30.99">-->
<!--                                    <input type="hidden" name="discount_amount" value="1.00">-->
<!--                                    <input type="hidden" name="currency_code" value="USD">-->
<!--                                    <input type="hidden" name="return" value=" ">-->
<!--                                    <input type="hidden" name="cancel_return" value=" ">-->
<!--                                    <input type="submit" name="submit" value="Add to cart" class="button">-->
<!--                                </fieldset>-->
<!--                            </form>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-3 product-men single">-->
<!--                <div class="men-pro-item simpleCart_shelfItem">-->
<!--                    <div class="men-thumb-item">-->
<!--                        <img src="images/w4.jpg" alt="" class="pro-image-front">-->
<!--                        <img src="images/w4.jpg" alt="" class="pro-image-back">-->
<!--                        <div class="men-cart-pro">-->
<!--                            <div class="inner-men-cart-pro">-->
<!--                                <a href="single.html" class="link-product-add-cart">Quick View</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <span class="product-new-top">New</span>-->
<!---->
<!--                    </div>-->
<!--                    <div class="item-info-product ">-->
<!--                        <h4><a href="single.html">Black Basic Shorts</a></h4>-->
<!--                        <div class="info-product-price">-->
<!--                            <span class="item_price">$120.99</span>-->
<!--                            <del>$189.71</del>-->
<!--                        </div>-->
<!--                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">-->
<!--                            <form action="#" method="post">-->
<!--                                <fieldset>-->
<!--                                    <input type="hidden" name="cmd" value="_cart">-->
<!--                                    <input type="hidden" name="add" value="1">-->
<!--                                    <input type="hidden" name="business" value=" ">-->
<!--                                    <input type="hidden" name="item_name" value="Black Basic Shorts">-->
<!--                                    <input type="hidden" name="amount" value="30.99">-->
<!--                                    <input type="hidden" name="discount_amount" value="1.00">-->
<!--                                    <input type="hidden" name="currency_code" value="USD">-->
<!--                                    <input type="hidden" name="return" value=" ">-->
<!--                                    <input type="hidden" name="cancel_return" value=" ">-->
<!--                                    <input type="submit" name="submit" value="Add to cart" class="button">-->
<!--                                </fieldset>-->
<!--                            </form>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-3 product-men single">-->
<!--                <div class="men-pro-item simpleCart_shelfItem">-->
<!--                    <div class="men-thumb-item">-->
<!--                        <img src="images/s6.jpg" alt="" class="pro-image-front">-->
<!--                        <img src="images/s6.jpg" alt="" class="pro-image-back">-->
<!--                        <div class="men-cart-pro">-->
<!--                            <div class="inner-men-cart-pro">-->
<!--                                <a href="single.html" class="link-product-add-cart">Quick View</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <span class="product-new-top">New</span>-->
<!---->
<!--                    </div>-->
<!--                    <div class="item-info-product ">-->
<!--                        <h4><a href="single.html">Aero Canvas Loafers  </a></h4>-->
<!--                        <div class="info-product-price">-->
<!--                            <span class="item_price">$120.99</span>-->
<!--                            <del>$199.71</del>-->
<!--                        </div>-->
<!--                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">-->
<!--                            <form action="#" method="post">-->
<!--                                <fieldset>-->
<!--                                    <input type="hidden" name="cmd" value="_cart">-->
<!--                                    <input type="hidden" name="add" value="1">-->
<!--                                    <input type="hidden" name="business" value=" ">-->
<!--                                    <input type="hidden" name="item_name" value="Aero Canvas Loafers">-->
<!--                                    <input type="hidden" name="amount" value="30.99">-->
<!--                                    <input type="hidden" name="discount_amount" value="1.00">-->
<!--                                    <input type="hidden" name="currency_code" value="USD">-->
<!--                                    <input type="hidden" name="return" value=" ">-->
<!--                                    <input type="hidden" name="cancel_return" value=" ">-->
<!--                                    <input type="submit" name="submit" value="Add to cart" class="button">-->
<!--                                </fieldset>-->
<!--                            </form>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-3 product-men single">-->
<!--                <div class="men-pro-item simpleCart_shelfItem">-->
<!--                    <div class="men-thumb-item">-->
<!--                        <img src="images/w7.jpg" alt="" class="pro-image-front">-->
<!--                        <img src="images/w7.jpg" alt="" class="pro-image-back">-->
<!--                        <div class="men-cart-pro">-->
<!--                            <div class="inner-men-cart-pro">-->
<!--                                <a href="single.html" class="link-product-add-cart">Quick View</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <span class="product-new-top">New</span>-->
<!---->
<!--                    </div>-->
<!--                    <div class="item-info-product ">-->
<!--                        <h4><a href="single.html">Ankle Length Socks</a></h4>-->
<!--                        <div class="info-product-price">-->
<!--                            <span class="item_price">$100.99</span>-->
<!--                            <del>$159.71</del>-->
<!--                        </div>-->
<!--                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">-->
<!--                            <form action="#" method="post">-->
<!--                                <fieldset>-->
<!--                                    <input type="hidden" name="cmd" value="_cart">-->
<!--                                    <input type="hidden" name="add" value="1">-->
<!--                                    <input type="hidden" name="business" value=" ">-->
<!--                                    <input type="hidden" name="item_name" value="Ankle Length Socks">-->
<!--                                    <input type="hidden" name="amount" value="30.99">-->
<!--                                    <input type="hidden" name="discount_amount" value="1.00">-->
<!--                                    <input type="hidden" name="currency_code" value="USD">-->
<!--                                    <input type="hidden" name="return" value=" ">-->
<!--                                    <input type="hidden" name="cancel_return" value=" ">-->
<!--                                    <input type="submit" name="submit" value="Add to cart" class="button">-->
<!--                                </fieldset>-->
<!--                            </form>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="clearfix"> </div>
            <!--//slider_owl-->
        </div>
    </div>
</div>
<?php
$flexslider = <<<JS
// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});

JS;

$this->registerJS($flexslider);

?>