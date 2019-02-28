<?php

namespace backend\controllers;

use common\models\DetailProduk;
use common\models\Tag;
use Yii;
use common\models\Produk;
use common\models\ProdukSearch;
use yii\base\Model;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * ProdukController implements the CRUD actions for Produk model.
 */
class ProdukController extends Controller
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
                        'actions' => ['create','view','delete' ,'index','update'],
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
     * Lists all Produk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProdukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produk model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $gambar = Yii::$app->db->createCommand("select * from detail_produk where id_produk = $id")->queryAll();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'gambar'=> $gambar,
        ]);
    }

    /**
     * Creates a new Produk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $produk = new Produk();
        $detail_produk = new DetailProduk();
        $data_produk = Yii::$app->request->post();
        $data_detail_produk = Yii::$app->request->post();
        if ($produk->load($data_produk)) {
            $produk->added_by = Yii::$app->user->getId();
            $produk->status = 10;

            $produk->source_code = UploadedFile::getInstance($produk,'source_code');
            if($produk->source_code!=null){
            	$produk->source_code->saveAs(Yii::getAlias('@webroot'). '/upload/source_code/'. $produk->source_code->baseName. '.'. $produk->source_code->extension);
	        }
            $produk->manual_book = UploadedFile::getInstances($produk,'manual_book');
            foreach ($produk->manual_book as $manual_book){
                $produk->manual_book = $manual_book;
//                Yii::$app->session->setFlash('success','.'.$manual_book);
                $manual_book->saveAs(Yii::getAlias('@webroot'). '/upload/manual/'. $manual_book->baseName. '.'. $manual_book->extension);
            }

            $produk->rancangan = UploadedFile::getInstances($produk,'rancangan');
            foreach ($produk->rancangan as $rancangan){
                $produk->rancangan = $rancangan;
//                Yii::$app->session->setFlash('success','.'.$rancangan);
                $rancangan->saveAs(Yii::getAlias('@webroot'). '/upload/rancangan/'. $rancangan->baseName. '.'. $rancangan->extension);
            }


            if ($produk->video!=null && isset($produk->video)){
                $video = null;
                preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $produk->video, $video);
                $produk->video = $video[1];
            }

            $transaction = Yii::$app->db->beginTransaction();
            if(!$produk->save(false)){

                    $transaction->rollBack();
                }
            else{

                    if($detail_produk->load($data_detail_produk,'')){
                        $detail_produk->gambar = UploadedFile::getInstances($detail_produk,'gambar');

                        foreach ($detail_produk->gambar as $gambar){
                            $model = new DetailProduk();
                            $model->id_produk = $produk->id_produk;
                            $model->gambar = $gambar;
                            if(!$model->save(false)){
                                $transaction->rollBack();
                            }
                            else{
                                $gambar->saveAs(Yii::getAlias('@webroot'). '/images/produk/'. $gambar->baseName. '.'. $gambar->extension);

                            }

                        }
                        $transaction->commit();
                        Yii::$app->session->setFlash('success','Berhasil Menambahkan Produk.');
                        return $this->redirect(['produk/index']);

                    }
                }
        }

        return $this->render('create', [
            'produk' => $produk,
            'detail_produk'=>$detail_produk
        ]);
    }

    /**
     * Updates an existing Produk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $produk = $this->findModel($id);
        $detail_sekarang = DetailProduk::find()->where(['id_produk'=>$id])->all();
        $detail_produk = new DetailProduk();
        $data = Yii::$app->request->post();
        $data_detail_produk =Yii::$app->request->post();



        $currentSource = $produk->source_code;
        $currentManual = $produk->manual_book;
        $currentRancangan = $produk->rancangan;

        if ($produk->load($data)) {


            $dataSourceCode = UploadedFile::getInstance($produk,'source_code');
            $dataManual = UploadedFile::getInstance($produk,'manual_book');
            $dataRancangan = UploadedFile::getInstance($produk,'rancangan');

            if($dataSourceCode != null){
                $produk->source_code = $dataSourceCode->getBaseName().'.'.$dataSourceCode->getExtension();
                $dataSourceCode->saveAs(Yii::getAlias('@webroot'). '/upload/source_code/'.$dataSourceCode->getBaseName().'.'.$dataSourceCode->getExtension());

            }else{
                $produk->source_code = $currentSource;
            }
            if($dataManual !=null ){
                $produk->manual_book = $dataManual->getBaseName().'.'.$dataManual->getExtension();
                $dataManual->saveAs(Yii::getAlias('@webroot'). '/upload/manual/'.$dataManual->getBaseName().'.'.$dataManual->getExtension());

            }else{
                $produk->manual_book = $currentManual;
            }

            if($dataRancangan != null){
                $produk->rancangan = $dataRancangan->getBaseName().'.'.$dataRancangan->getExtension();
                $dataRancangan->saveAs(Yii::getAlias('@webroot'). '/upload/rancangan/'.$dataRancangan->getBaseName().'.'.$dataRancangan->getExtension());
            }
            else{
                $produk->rancangan = $currentRancangan;
            }

//	        if ($produk->load($data_detail_produk, 'source_code')) :
//		        $produk->source_code = UploadedFile::getInstances($produk,'source_code');
//		        foreach ($produk->source_code as $manual_book){
//			        $produk->source_code = $manual_book;
//
//			        $manual_book->saveAs(Yii::$app->basePath. '/web/upload/source_code/'. $manual_book->baseName. '.'. $manual_book->extension);
//		        }
//	        endif;
//            if ($produk->load($data_detail_produk, 'manual_book')) :
//                $produk->manual_book = UploadedFile::getInstances($produk,'manual_book');
//                foreach ($produk->manual_book as $manual_book){
//                    $produk->manual_book = $manual_book;
//
//                    $manual_book->saveAs(Yii::$app->basePath. '/web/upload/manual/'. $manual_book->baseName. '.'. $manual_book->extension);
//                }
//            endif;
//
//            if ($produk->load($data_detail_produk, 'rancangan')) :
//                $produk->rancangan = UploadedFile::getInstances($produk,'rancangan');
//                foreach ($produk->rancangan as $rancangan){
//                    $produk->rancangan = $rancangan;
//    //                Yii::$app->session->setFlash('success','.'.$rancangan);
//                    $rancangan->saveAs(Yii::$app->basePath. '/web/upload/rancangan/'. $rancangan->baseName. '.'. $rancangan->extension);
//                }
//            endif;

           // remove semua data detail dengan id sekian;

            $db = Yii::$app->db;
            $transaction = $db->beginTransaction();

            //tambahkan semua item.
            if ($produk->video != null && strlen($produk->video) > 11) {
                $video = null;
                preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $produk->video, $video);
                $produk->video = $video[1];
            }

            if (!$produk->save(false)) {

                $transaction->rollBack();
            } else {
                if ($detail_produk->load($data_detail_produk, '')) {
                    $dataGambar= UploadedFile::getInstances($detail_produk, 'gambar');

                    if($dataGambar !=null){
                        $delete = $db->createCommand()->delete('detail_produk', [
                            'id_produk' => $id
                        ])->execute();
                        foreach ($dataGambar as $gambar) {
                            $model = new DetailProduk();
                            $model->id_produk = $produk->id_produk;
                            $model->gambar = $gambar;
                            if (!$model->save(false)) {
                                $transaction->rollBack();
                            } else {
                                $gambar->saveAs(Yii::getAlias('@webroot') . '/images/produk/' . $gambar->baseName . '.' . $gambar->extension);
                            }
                        }

                    }

                    $transaction->commit();
                    Yii::$app->session->setFlash('success', 'Berhasil Memperbarui Produk.');
                    return $this->redirect(['view', 'id' => $produk->id_produk]);




                }

            }
        }

        return $this->render('update', [
            'produk' => $produk,
            'detail_produk'=>$detail_produk,
        ]);
    }

    /**
     * Deletes an existing Produk model.
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
     * Finds the Produk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public static function actionTagList(){
        return Tag::find()->all();
    }
}
