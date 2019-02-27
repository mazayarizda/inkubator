<?php
use backend\models\Carousel;
use yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: mazayarizda
 * Date: 24/01/2018
 * Time: 17:15
 */
?>
<div class="row">
    <div class="col-md-12">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
<!--    <!-- Indicators -->
<!--    <ol class="carousel-indicators">-->
<!--        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>-->
<!--        <li data-target="#myCarousel" data-slide-to="1" class=""></li>-->
<!--        <li data-target="#myCarousel" data-slide-to="2" class=""></li>-->
<!--        <li data-target="#myCarousel" data-slide-to="3" class=""></li>-->
<!--        <li data-target="#myCarousel" data-slide-to="4" class=""></li>-->
<!--    </ol>-->
    <div class="carousel-inner" role="listbox">

        <?php $model=Carousel::find()->all();
        $nomor=1;
        foreach($model as $db):
            if ($nomor==1):
        ?>
        <div class="item active">
            <?= Html::img(Yii::$app->urlManager->getBaseUrl().'/admin/images/carousel/'.$db['file_carousel'],['width' => '1680px','height'=>'700px']); ?>
        </div>
        <?php else:?>
        <div class="item item2">
            <?= Html::img(Yii::$app->urlManager->getBaseUrl().'/admin/images/carousel/'.$db['file_carousel'],['width' => '1680px','height'=>'700px']); ?>
        </div>
        <?php
            endif;
            $nomor++;
            endforeach; ?>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!-- The Modal -->


    </div>
</div>
