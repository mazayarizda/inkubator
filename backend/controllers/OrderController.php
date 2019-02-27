<?php

namespace backend\controllers;

use common\models\DetailOrder;
use common\models\Produk;
use common\models\User;
use Yii;
use common\models\order;
use common\models\OrderSearch;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * OrderController implements the CRUD actions for order model.
 */
class OrderController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create','view','delete' ,'index','update','verifikasi'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single order model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
    	$data = $this->findDetail($id);

    	$dataProvider = new ArrayDataProvider(
    		['allModels'=>$data,
		    ]
	    );
        return $this->render('view', [
            'model' => $dataProvider,
	        'idOrder'=>$id,
        ]);
    }

    /**
     * Updates an existing order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Order berhasil diperbaharui.');
            return $this->redirect(['view', 'id' => $model->id_order]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findDetail($id) {
	    $data = DetailOrder::find()->where( [ 'id_order' => $id ] )->all();

	    return $data;
    }

    public function actionVerifikasi($id){
    	$model = $this->findModel($id);
    	$model->status = 'true';
    	if($model->save()){
    		$this->sendMail($model->id_user,$model->id_order);
	    }
	    return $this->redirect(['order/index']);
    }

    protected function sendMail($idUser, $idOrder){
    	$user = User::findOne($idUser);
    	$dataDetail = DetailOrder::find()->where(['id_order'=>$idOrder])->all();
    	$produk = [];
    	foreach ($dataDetail as $dataProduk){
    		$pr = Produk::findOne($dataProduk);
    		array_push($produk,$pr);
	    }
	    Yii::$app->mailer->compose('produk-html',['user'=>$user,'produk'=>$produk])
		    ->setFrom([\Yii::$app->params['adminEmail'] => 'Admin Top Aplikasi'])
		    ->setTo($user->email)->setSubject('[Top Aplikasi] Produk')
		    ->send();
    }

}
