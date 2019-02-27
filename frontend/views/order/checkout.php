<?php
/**
 * Created by PhpStorm.
 * User: Adryan Eka Vandra
 * Date: 4/14/2018
 * Time: 10:55 AM
 */

$profil = \common\models\Profil::findOne(1);
?>
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Cart</h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <ul class="w3_short">
                    <li><a href="<?php echo Yii::$app->getHomeUrl();?>site/index">Home</a><i>|</i></li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>
<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="agile_ab_w3ls_info">
            <div class="col-md-12 ab_pic_w3ls_text_info">
             <div class="row">
                 <div class="col-md-12">
                     <div class="alert alert-success">
                         <h3 class="text-capitalize">Pembelian anda berhasil</h3>
                         <p class="text-dark">Anda telah berhasil melakukan pembelian, Silahkan Cek Email anda untuk instruksi selanjutnya.</p>
                         <br>
                     </div>
                 </div>
             </div>
            </div>
            <div class="clearfix"></div>
            </div>

        </div>
    </div>
</div>
