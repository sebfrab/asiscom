<?php

namespace backend\controllers;

use Yii;
use common\models\Testimonio;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Json;

/**
 * TestimonioController implements the CRUD actions for Testimonio model.
 */
class TestimonioController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Testimonio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Testimonio::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Testimonio model.
     * @param integer $idtestimonio
     * @param integer $estado_idestado
     * @return mixed
     */
    public function actionView($idtestimonio, $estado_idestado)
    {
        return $this->render('view', [
            'model' => $this->findModel($idtestimonio, $estado_idestado),
        ]);
    }

    /**
     * Creates a new Testimonio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Testimonio();

        
        if( $model->load(Yii::$app->request->post()) )
        {
            $model->estado_idestado = 1;
            if($model->validate())
            {
                /*$json = Json::decode($model->crop_info);
                print_r($json[0]);
                echo '<br/>';
                exit();*/
                
                $model->image = \yii\web\UploadedFile::getInstance($model, 'image');
                if($model->save()){
                    /*if($model->file = UploadedFile::getInstance($model, 'file')){
                        $model->file->saveAs('../../frontend/web/images/testimonio/'.$model->idtestimonio.'.jpg');
                    }*/
                    return $this->redirect(['index']);
                }
            }
        }
        
        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($idtestimonio, $estado_idestado)
    {
        $model = $this->findModel($idtestimonio, $estado_idestado);

        if( $model->load(Yii::$app->request->post()) )
        {
            if($model->validate())
            {
                $model->image = \yii\web\UploadedFile::getInstance($model, 'image');
                if($model->save()){
                    return $this->redirect(['index']);
                }
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);    
    }

    /**
     * Deletes an existing Testimonio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idtestimonio
     * @param integer $estado_idestado
     * @return mixed
     */
    public function actionDelete($idtestimonio, $estado_idestado)
    {
        $this->findModel($idtestimonio, $estado_idestado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Testimonio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idtestimonio
     * @param integer $estado_idestado
     * @return Testimonio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idtestimonio, $estado_idestado)
    {
        if (($model = Testimonio::findOne(['idtestimonio' => $idtestimonio, 'estado_idestado' => $estado_idestado])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
