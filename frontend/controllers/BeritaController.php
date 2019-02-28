<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 28/02/19
 * Time: 22:56
 */

namespace frontend\controllers;


use common\models\Berita;
use yii\web\Controller;

class BeritaController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Berita::find()->orderBy('created_at DESC')->limit(6)->all();
      return $this->render('index',['model'=>$model]);
    }
    public function actionSemuaBerita()
    {
        $model = Berita::find()->orderBy('created_at DESC')->all();
        return $this->render('allberita',[
            'model'=>$model
        ]);
    }
    public function actionBerita($id)
    {
        $berita = Berita::findOne(['id_berita'=>$id]);
        return $this->render('berita',[
            'berita'=>$berita,
        ]);
    }
}