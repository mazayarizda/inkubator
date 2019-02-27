<?php
/**
 * Created by PhpStorm.
 * User: mazayarizda
 * Date: 01/03/2018
 * Time: 12:32
 */
/* @var $this \yii\web\View */?>
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Contact<span> Us</span></h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <ul class="w3_short">
                    <li><a href="<?php echo Yii::$app->getHomeUrl();?>site/index">Home</a><i>|</i></li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>
<!--/contact-->
<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="contact-grid-agile-w3s">
            <div class="row">
                <div class="col-md-3 contact-grid-agile-w3">
                    <div class="contact-grid-agile-w31">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h4>Address</h4>
                        <p><?=$profil->alamat?></p>
                    </div>
                </div>
                <div class="col-md-4 contact-grid-agile-w3">
                    <div class="contact-grid-agile-w32">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h4>Whatsapp</h4>
                        <p><a href="https://chat.whatsapp.com/FkJkah3OaXVAKKVXDV1Py2"><img src="http://pngimg.com/uploads/whatsapp/whatsapp_PNG21.png" widht="30" height="30"/> WhatsApp</a> </span> </p>
                    </div>
                </div>
                <div class="col-md-4 contact-grid-agile-w3">
                    <div class="contact-grid-agile-w33">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <h4>Email</h4>
                        <p><a href="mailto:<?=$profil->email?>"><?=$profil->email   ?></a></p>
                    </div>
                </div>
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>
</div>


