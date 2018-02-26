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
        return $this->render('view', [
            'model' => $this->findModel($id),
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
            if ($produk->video!=null){
                $video = null;
                preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $produk->video, $video);
                $produk->video = $video[1];
            }

            $transaction = Yii::$app->db->beginTransaction();
                if(!$produk->save()){

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
                                $gambar->saveAs(Yii::$app->basePath. '/web/images/produk/'. $gambar->baseName. '.'. $gambar->extension);

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
        $detail_sekarang = Yii::$app->db->createCommand('select * from detail_produk where id_produk = '.$id)->queryAll();
        $detail_produk = new DetailProduk();
        $data = Yii::$app->request->post();
        $data_detail_produk =Yii::$app->request->post();
        if ($produk->load($data)) {

            //remove semua data detail dengan id sekian;
            $db = Yii::$app->db;
            $transaction = $db->beginTransaction();

            //tambahkan semua item.
            if ($produk->video != null && strlen($produk->video) < 10) {
                $video = null;
                preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $produk->video, $video);
                $produk->video = $video[1];
            }
            if (!$produk->save()) {

                $transaction->rollBack();
            } else {
                if ($detail_produk->load($data_detail_produk, '')) {
                    $detail_produk->gambar = UploadedFile::getInstances($detail_produk, 'gambar');
                    $a = 0;
                    $equal = true;
                    foreach ($detail_produk->gambar as $gambar) {
                        if(!empty($detail_sekarang)){
                            if($detail_sekarang[$a]['gambar'] != $gambar){
                                $equal = false;
                            }

                        }
                        elseif(empty($detail_sekarang)){
                            $model = new DetailProduk();
                            $model->id_produk = $produk->id_produk;
                            $model->gambar = $gambar;
                            if (!$model->save(false)) {
                                $transaction->rollBack();
                            } else {
                                $gambar->saveAs(Yii::$app->basePath . '/web/images/produk/' . $gambar->baseName . '.' . $gambar->extension);

                            }
                        }
                        if($equal == false){
                            $delete = $db->createCommand()->delete('detail_produk', [
                                'id_produk' => $id
                            ])->execute();
                            $model = new DetailProduk();
                            $model->id_produk = $produk->id_produk;
                            $model->gambar = $gambar;
                            if (!$model->save(false)) {
                                $transaction->rollBack();
                            } else {
                                $gambar->saveAs(Yii::$app->basePath . '/web/images/produk/' . $gambar->baseName . '.' . $gambar->extension);

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
