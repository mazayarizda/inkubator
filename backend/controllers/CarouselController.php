<?php

namespace backend\controllers;

use Yii;
use backend\models\carousel;
use backend\models\CarouselSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * CarouselController implements the CRUD actions for carousel model.
 */
class CarouselController extends Controller
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
     * Lists all carousel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CarouselSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single carousel model.
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
     * Creates a new carousel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new carousel();
        $data = Yii::$app->request->post();
        $model->file_carousel = UploadedFile::getInstance($model,'file_carousel');

        date_default_timezone_set('Asia/Jakarta');
        $model->created_at = date('Y-m-d h:i:s');
        $model->updated_at = date('Y-m-d h:i:s');

        if($model->file_carousel !=NULL) $data['Carousel']['file_carousel'] = $model->file_carousel;

        if ($model->load($data)) {


            if ($model->file_carousel != NULL){
                $model->file_carousel->saveAs(Yii::getAlias('@webroot'). '/images/carousel/'. $model->file_carousel->baseName. '.'. $model->file_carousel->extension);
            }
            else{
                $model->file_carousel = NULL;
            }

            $model->save(false);
            Yii::$app->session->setFlash('success','Carousel berhasil dibuat.');
            return $this->redirect(['carousel/index']);
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing carousel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $gambar_sekarang = $model->file_carousel;
        $data = Yii::$app->request->post();

        date_default_timezone_set('Asia/Jakarta');
        $model->updated_at = date('Y-m-d h:i:s');

        if ($model->load($data)) {

            $gambar = UploadedFile::getInstance($model,'file_carousel');
            if(isset($gambar)){
                $gambar->saveAs(Yii::getAlias('@webroot'). '/images/carousel/'. $gambar->baseName. '.'. $gambar->extension);
                $model->file_carousel = $gambar->baseName . '.' . $gambar->extension;
            }
            else{
                $model->file_carousel = $gambar_sekarang;
            }
            $model->save(false);
            Yii::$app->session->setFlash('success','Carousel berhasil diperbarui.');
            return $this->redirect(['view', 'id' => $model->id_carousel]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing carousel model.
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
     * Finds the carousel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return carousel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = carousel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
