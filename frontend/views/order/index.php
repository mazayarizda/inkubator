<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
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
                <div class="order-index">

                    <h1><?= Html::encode($this->title) ?></h1>
		            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <p>
			            <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

		            <?= GridView::widget([
			            'dataProvider' => $dataProvider,
			            'filterModel' => $searchModel,
			            'columns' => [
				            ['class' => 'yii\grid\SerialColumn'],

				            'id_order',
				            'id_user',
				            'date_order',
				            'total',


				            ['class' => 'yii\grid\ActionColumn','header'=>'Aksi'],
			            ],
		            ]); ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

