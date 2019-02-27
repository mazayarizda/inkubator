<?php

namespace frontend\controllers;

use common\models\DetailOrder;
use common\models\Produk;
use Yii;
use common\models\Order;
use common\models\OrderSearch;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{

	protected $totalItems = 0;
	protected $totalPrice = 0.00;

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['index'],
				'rules' => [
					[
						'actions' => ['index','checkout','cart'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
		];
	}


    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
       if(!isset(Yii::$app->session['cart'])  || empty(Yii::$app->session['cart'])){
       	Yii::$app->session->setFlash('error','Empty Cart');
       	return $this->redirect(['order/cart','cart'=>Yii::$app->session['cart']]);
       }

       $this->updateCart();
       $this->setTotal();

	    return $this->render('cart',['cart'=>Yii::$app->session['cart']]);
    }


    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Halaman yang dicari tidak ditemukan.');
    }

    public function actionAddToCart($id){

    	if(!intval($id)|| empty($id)){
    		Yii::$app->session->setFlash('danger','Tidak bisa menemukan produk ini');
    		return $this->render('cart',['cart'=>Yii::$app->session['cart']]);
	    }

	    if(!isset(Yii::$app->session['cart'])){
    		Yii::$app->session['cart'] = [];
    		Yii::$app->session['total_item'] = 0;
			Yii::$app->session['total_price'] = 0.00;
	    }
	    $this->addToCart($id);
    	return $this->redirect(['order/index']);
       }

    public function addToCart($id){
    	$session = Yii::$app->session['cart'];
    	$session[$id] = 1;
    	Yii::$app->session['cart'] = $session;
    }

    protected function setTotal(){

    	Yii::$app->session['total_item'] = $this->totalItems(Yii::$app->session['cart']);
    	Yii::$app->session['total_price'] = $this->totalPrice(Yii::$app->session['cart']);

    	$this->totalPrice = Yii::$app->session['total_price'];
    	$this->totalItems = Yii::$app->session['total_item'];
    }

    protected function totalPrice($cart){

    	$price = 0.00;
    	if(is_array($cart)){
    		foreach ($cart as $key => $qty){
			    try {
				    $item = $this->findProduct( $key );
				    $price += $item->harga;
			    } catch ( NotFoundHttpException $e ) {
			    }

		    }
	    }
	    if(empty($cart)){
    		$price = 0.00;
    		$this->totalPrice = $price;
	    }
	    return $price;
    }
    protected function totalItems($cart){

    	$total = 0;
    	if(is_array($cart)){
    		foreach ($cart as $key=> $qty){
				$total +=1;
		    }
	    }
	    return $total;
    }
    public function actionCheckout(){

    	Yii::$app->mailer->compose('payment-html',['user'=>Yii::$app->user->identity])
	                     ->setFrom([\Yii::$app->params['adminEmail'] => 'Admin Top Aplikasi'])
	                     ->setTo(Yii::$app->user->identity->email)->setSubject('[Top Aplikasi] Konfirmasi Pembayaran')
		    ->send();

    	//set Order
	    $dataCart = Yii::$app->session['cart'];
	    $transaction = Yii::$app->db->beginTransaction();
	    $idOrder = Order::createOrder();

	    foreach ($dataCart as $key=>$value){
			$modelDetail = new DetailOrder();
			$modelDetail->id_produk = $key;
			$modelDetail->id_order = $idOrder;
			$modelDetail->save(false);
	    }
	    try {
		    $transaction->commit();
	    } catch ( Exception $e ) {
	    	echo '<pre>';
	    	echo  $e;
	    	exit();
	    }
	    $this->removeCart();

    	return	$this->render('checkout');
    }

    public function removeCart(){
	    $session = Yii::$app->session['cart'];
	    foreach ($session as $item=>$value){
		    unset($session[$item]);
	    }

	    Yii::$app->session['cart'] = $session;
    }
    public function actionCart(){
    	return $this->render('cart',['cart'=>Yii::$app->session['cart']]);
    }

    public function findProduct($id){
	    if (($model = Produk::findOne($id)) !== null) {
		    return $model;
	    }

	    throw new NotFoundHttpException('Halaman yang dicari tidak ditemukan.');
    }

    public function actionRemoveCart($id){
    	$session = Yii::$app->session['cart'];
    	unset($session[$id]);
    	Yii::$app->session['cart'] = $session;
    	$this->redirect(['order/index']);
    }
	private function updateCart() {

    	foreach (Yii::$app->session['cart'] as $id){
    		if(isset($_POST[$id])){
    			if($_POST[$id] == 0){
				    $session = Yii::$app->session['cart'];
				    unset($session['id']);
				    Yii::$app->session['cart'] = $session;
			    }
			    else{
    				$cart = Yii::$app->session['cart'];
    				$cart[$id] = $_POST[$id];
    				Yii::$app->session['cart'] = $cart;
			    }


		    }

	    }
	}

}
