<?php
use common\models\Profil;
use yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: mazayarizda
 * Date: 05/04/2018
 * Time: 18:55
 */?>

<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>How to <span>Download </span></h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="<?php echo Yii::$app->getHomeUrl();?>site/index">Home</a><i>|</i></li>
                    <li>How To</li>
                    <li>Download</li>
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

                <div class="col-md-12 ab_pic_w3ls_text_info">
                    <h5>How To <span> Download</span> </h5>
                    <p><?php echo $db->isi_profil?></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

