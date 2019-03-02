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

$this->title = $software->nama_produk;
$this->params['breadcrumbs'][] = ['label' => 'Software', 'url' => ['produk/software']];
$this->params['breadcrumbs'][] = $this->title;
$count = 0;
?>




<section class="blog-details-page">
    <div class="thm-container">
        <div class="row">
            <div class="col-md-8">
                <div class="single-blog-details-content">
                    <div class="featured-img-box">
                        <?= Html::img(Yii::getAlias('@imgBackend/produk/'.$gambar->gambar),['alt'=>'Gambar Produk','height'=>434, 'width'=>770])?>
                        <div class="date-box">
                            <?=Html::encode(\Carbon\Carbon::createFromTimestampUTC($software->created_at)->format('d M')) ?>
                        </div><!-- /.date-box -->
                    </div><!-- /.img-box -->
                    <div class="text-box">
                        <h3><?=$this->title?></h3>
                        <div class="meta-info">
                            <a href="#"><?=$software->addedBy->nama?></a>
                            <span class="sep">-</span>
                            <?=$software->kategoriProduk->nama_kategori?>
                        </div><!-- /.meta-info -->
                        <?=$software->deskripsi_produk?>
                        <?=$software->fitur_produk?>
                        <?=$software->spesifikasi?>
                    </div><!-- /.text-box -->
                    <div class="author-box clearfix">
                        <div class="img-box">
                            <?= Html::img(Yii::getAlias('@imgBackend/avatar/'.$software->addedBy->avatar),['alt'=>'Gambar Penerbit Berita'])?>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <h3><?=$software->addedBy->nama?></h3>
                            <p>Pengelola Situs TopApp.id</p>
                        </div><!-- /.text-box -->
                    </div><!-- /.author-box -->

                </div><!-- /.single-blog-details-content -->
            </div><!-- /.col-md-8 -->
            <div class="col-md-4">
                <div class="sidebar sidebar-right">
                    <div class="single-sidebar recent-post-sidebar">
                        <div class="title">
                            <h3>Produk Terbaru</h3>
                        </div><!-- /.title -->
                        <?php foreach ($latestProduk as $item):?>

                            <div class="single-recent-post">
                                <div class="img-box">
                                    <?= Html::img(Yii::getAlias('@imgBackend/produk/'.$gambarLatestProduk[$count]->gambar),['alt'=>'gambar produk',
                                        'height'=>59, 'width'=>59])?>
                                </div><!-- /.img-box -->
                                <div class="text-box">
                                    <?=Html::a('<h4>'.$item->nama_produk.'</h4>',\yii\helpers\Url::to(['software/view','id'=>$item->id_produk]))?>
                                </div><!-- /.text-box -->
                            </div><!-- /.single-recent-post -->



                        <?php
                        $count++;
                        endforeach;?>


                    </div><!-- /.single-sidebar recent-post-sidebar -->
                    <div class="single-sidebar categories-sidebar">
                        <div class="title">
                            <h3>Kategori</h3>
                        </div><!-- /.title -->
                        <ul class="category-lists">
                            <?php foreach ($kategori as $tag): ?>
                            <li>
                                <?= Html::a($tag->nama_kategori.'<i class="fa fa-angle-right"></i>',\yii\helpers\Url::to(['kategori/view','id'=>$tag->id_kategori]))?>
                            </li>

                            <?php endforeach; ?>
                        </ul><!-- /.category-lists -->
                    </div><!-- /.single-sidebar categories-sidebar -->
                    <div class="single-sidebar categories-sidebar">
                        <div class="title">
                            <h3>Recent Posts</h3>
                        </div><!-- /.title -->
                        <ul class="tags-lists">
                            <?php foreach ($recentPost as $tag): ?>
                                <li><?= Html::a($tag->nama_tag,\yii\helpers\Url::to(['tag/view','id'=>$tag->id
                                    ])) ?></li>
                            <?php endforeach; ?>

                        </ul><!-- /.tags-lists -->
                    </div><!-- /.single-sidebar tags-sidebar -->
                </div><!-- /.sidebar sidebar-right -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.blog-details-page -->


