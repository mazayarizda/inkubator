<?php
use common\models\Profil;
use yii\helpers\Html;


/**
 * Created by PhpStorm.
 * User: mazayarizda
 * Date: 01/03/2018
 * Time: 12:10
 */?>

<div class="inner-banner">
    <div class="thm-container">
        <ul class="breadcumb">
            <li><a href="index.html">Home</a></li><!--
            --><li><span class="sep">-</span></li><!--
            --><li><span class="page-name">Blog</span></li>
        </ul><!-- /.breadcumb -->
        <h3>Blog Posts</h3>
    </div><!-- /.thm-container -->
</div><!-- /.inner-banner -->

<section class="blog-style-one">
    <div class="thm-container">

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-blog-style-one">
                    <div class="img-box">
                        <img src="img/blog-1-1.jpg" alt="" />
                        <a href="#" class="read-more">+</a>
                        <div class="date-box">
                            4 Aug
                        </div><!-- /.date-box -->
                    </div><!-- /.img-box -->
                    <div class="text-box">
                        <a href="blog-details.html"><h3>How to install in your phone</h3></a>
                        <p>Praesent dapibus is not eleifend augue eget sollicitudin velit malesuada les blandit diam ace venenatis feugiat tellus odio.</p>
                    </div><!-- /.text-box -->
                </div><!-- /.single-blog-style-one -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-blog-style-one">
                    <div class="img-box">
                        <img src="img/blog-1-2.jpg" alt="" />
                        <a href="#" class="read-more">+</a>
                        <div class="date-box">
                            5 Aug
                        </div><!-- /.date-box -->
                    </div><!-- /.img-box -->
                    <div class="text-box">
                        <a href="blog-details.html"><h3>Get a free 1 month app trial</h3></a>
                        <p>Praesent dapibus is not eleifend augue eget sollicitudin velit malesuada les blandit diam ace venenatis feugiat tellus odio.</p>
                    </div><!-- /.text-box -->
                </div><!-- /.single-blog-style-one -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-blog-style-one">
                    <div class="img-box">
                        <img src="img/blog-1-3.jpg" alt="" />
                        <a href="#" class="read-more">+</a>
                        <div class="date-box">
                            8 Aug
                        </div><!-- /.date-box -->
                    </div><!-- /.img-box -->
                    <div class="text-box">
                        <a href="blog-details.html"><h3>Upgrade your plan at anytime</h3></a>
                        <p>Praesent dapibus is not eleifend augue eget sollicitudin velit malesuada les blandit diam ace venenatis feugiat tellus odio.</p>
                    </div><!-- /.text-box -->
                </div><!-- /.single-blog-style-one -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-blog-style-one">
                    <div class="img-box">
                        <img src="img/blog-1-4.jpg" alt="" />
                        <a href="#" class="read-more">+</a>
                        <div class="date-box">
                            26 Aug
                        </div><!-- /.date-box -->
                    </div><!-- /.img-box -->
                    <div class="text-box">
                        <a href="blog-details.html"><h3>Where can i download this app</h3></a>
                        <p>Praesent dapibus is not eleifend augue eget sollicitudin velit malesuada les blandit diam ace venenatis feugiat tellus odio.</p>
                    </div><!-- /.text-box -->
                </div><!-- /.single-blog-style-one -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-blog-style-one">
                    <div class="img-box">
                        <img src="img/blog-1-5.jpg" alt="" />
                        <a href="#" class="read-more">+</a>
                        <div class="date-box">
                            27 Aug
                        </div><!-- /.date-box -->
                    </div><!-- /.img-box -->
                    <div class="text-box">
                        <a href="blog-details.html"><h3>Is there a setup fee</h3></a>
                        <p>Praesent dapibus is not eleifend augue eget sollicitudin velit malesuada les blandit diam ace venenatis feugiat tellus odio.</p>
                    </div><!-- /.text-box -->
                </div><!-- /.single-blog-style-one -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-blog-style-one">
                    <div class="img-box">
                        <img src="img/blog-1-6.jpg" alt="" />
                        <a href="#" class="read-more">+</a>
                        <div class="date-box">
                            30 Aug
                        </div><!-- /.date-box -->
                    </div><!-- /.img-box -->
                    <div class="text-box">
                        <a href="blog-details.html"><h3>How to deactive app function</h3></a>
                        <p>Praesent dapibus is not eleifend augue eget sollicitudin velit malesuada les blandit diam ace venenatis feugiat tellus odio.</p>
                    </div><!-- /.text-box -->
                </div><!-- /.single-blog-style-one -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
        <div class="more-btn text-center">
            <a href="#" class="load-more">Load More</a>
        </div><!-- /.more-btn text-center -->
    </div><!-- /.thm-container -->
</section><!-- /.blog-style-one -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>About <span>Us </span></h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="<?php echo Yii::$app->getHomeUrl();?>site/index">Home</a><i>|</i></li>
                    <li>About</li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>
<!-- /banner_bottom_agile_info -->
<?php $model=Profil::find()->all();
foreach($model as $db):
?>
<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="agile_ab_w3ls_info">
            <div class="col-md-6 ab_pic_w3ls">
                <div class="img-responsive">
                    <?= Html::img(Yii::$app->urlManager->getBaseUrl().'/admin/images/profil/'.$db['foto_profil'],['width' => '500px','height'=>'286px']); ?>
                </div>
            </div>
            <div class="col-md-6 ab_pic_w3ls_text_info">
                <h5>About <span> <?=Yii::$app->name?></span> </h5>
                <p><?php echo $db->isi_profil?></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php endforeach; ?>
