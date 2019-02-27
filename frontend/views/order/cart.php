<?php
/**
 * Created by PhpStorm.
 * User: Adryan Eka Vandra
 * Date: 4/13/2018
 * Time: 9:19 PM
 */

use yii\helpers\Html;

$this->title                   = 'Cart';
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
                    <table id="cart" class="table table-responsive table-bordered">
                        <thead>
                        <th>No</th>
                        <th>Nama Item</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                        </thead>
                        <tbody>
                        <?php
                        $counter = 1;
                        if(empty($cart)){
                            echo '<tr><td colspan="4" class="text-center">Tidak ada item</td></tr>';
                        }else{
                        foreach ($cart as $key => $qty):
	                        $dataItem = \common\models\Produk::findOne($key);
	                        ?>
                            <tr>
                                <td class="text-center"><?=$counter?></td>
                                <td class="text-center"><?=$dataItem->nama_produk?></td>
                                <td class="text-right"><?=Yii::$app->formatter->asCurrency($dataItem->harga)?></td>
                                <td class="text-center"><?=Html::a('<i class="fa fa-trash"></i>',['order/remove-cart','id'=>$dataItem->id_produk],['class'=> 'btn btn-xs btn-danger'])?></td>
                            </tr>
	                        <?php
	                        $counter++;
                        endforeach;
                        ?>
                        <tr>
                            <td class="text-center">Total</td>
                            <td class="text-right" colspan="2"><?=Yii::$app->formatter->asCurrency(Yii::$app->session['total_price'])?></td>
                        </tr>
                        <?php }
                        ?>
                        </tbody>
                    </table>


				</div>
			</div>
			<div class="clearfix"></div>
            <div class="row">
                <div class="col-md-6">
	                <?=Html::a('<i class="fa fa-arrow-left"></i> Lanjutkan Belanja',['site/index'],['class'=>'btn btn-success'])?>
                </div>
                <div class="col-md-6 text-right">

	                <?=Html::a('<i class="fa fa-credit-card"></i> Checkout',['order/checkout'],['class'=>empty($cart)?'btn btn-primary btn-disabled':'btn btn-primary','disabled'=> empty($cart)?true:false,'style'=>empty($cart)?'display:none':''])?>
                </div>
            </div>
            </div>
		</div>
	</div>
</div>
