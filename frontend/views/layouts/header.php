<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 26/02/19
 * Time: 20:57
 */

use yii\helpers\Html; ?>


<header class="header header-home-one">
    <nav class="navbar navbar-default header-navigation stricky">
        <div class="thm-container clearfix">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target=".main-navigation" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>

                <a class="navbar-brand" href="<?=\yii\helpers\Url::to(['site/index'])?>">
                    <!--Yii::getAlias('@imgBackend/topbanner.jpg') -->
                    <?= \yii\helpers\Html::img('', ['alt' => 'TopApp.id', 'height' => '%', 'width' => '15%']) ?>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse main-navigation mainmenu " id="main-nav-bar">

                <ul class="nav navbar-nav navigation-box">
                    <li>
                        <a href="#">Produk</a>
                        <ul class="sub-menu">
                            <li>
                                <?= \yii\helpers\Html::a('Software', ['site/kategori','id'=>0]) ?>

                            </li>
                            <li>
                                <?= \yii\helpers\Html::a('Training', ['site/pelatihan']) ?>

                            </li>
                        </ul><!-- /.sub-menu -->
                    </li>
                    <li>

                        <?= \yii\helpers\Html::a('Tentang Kami', ['site/profil']) ?>
                    </li>

                    <li>
                        <a href="#">Blog</a>
                        <ul class="sub-menu right-align">
                            <li>
                                <?= \yii\helpers\Html::a('Berita', ['site/semua-berita']) ?>

                            </li>
                            <li>
                                <?= \yii\helpers\Html::a('Kegiatan Kami', ['site/berita']) ?>
                            </li>
                        </ul><!-- /.sub-menu -->
                    </li>
                    <li>
                        <?= \yii\helpers\Html::a('Kontak', ['site/contact']) ?>

                        </li>
                    <li>
                        <?= \yii\helpers\Html::a(Yii::$app->getUser()->getIsGuest() ? 'Login' : Yii::$app->getUser()->getIdentity()->nama, ['site/login']) ?>
                        <?php if (!Yii::$app->getUser()->getIsGuest()) : ?>
                            <ul class="sub-menu">
                                <li>
                                    <?= \yii\helpers\Html::a('Profil',['user/view']) ?>
                                </li>
                                <li>  <?= Html::a(
                                        'Sign out',
                                        ['/site/logout'],
                                        ['data-method' => 'post']
                                    ) ?></li>

                            </ul><!-- /.sub-menu -->
                        <?php endif; ?>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</header><!-- /.header -->

