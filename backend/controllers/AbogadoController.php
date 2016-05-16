<?php

namespace backend\controllers;

use Yii;
use common\models\Abogado;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AbogadoController implements the CRUD actions for Abogado model.
 */
class AbogadoController extends Controller
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
     * Lists all Abogado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Abogado::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Abogado model.
     * @param integer $idabogado
     * @param integer $estado_idestado
     * @return mixed
     */
    public function actionView($idabogado, $estado_idestado)
    {
        return $this->render('view', [
            'model' => $this->findModel($idabogado, $estado_idestado),
        ]);
    }

    /**
     * Creates a new Abogado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Abogado();

        if( $model->load(Yii::$app->request->post()) )
        {
            $model->estado_idestado = 1;
            if($model->validate())
            {
                $model->image = \yii\web\UploadedFile::getInstance($model, 'image');
                if($model->save()){
                    return $this->redirect(['index']);
                }
            }
        }
        
        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing Abogado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idabogado
     * @param integer $estado_idestado
     * @return mixed
     */
    public function actionUpdate($idabogado, $estado_idestado)
    {
        $model = $this->findModel($idabogado, $estado_idestado);

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
     * Deletes an existing Abogado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idabogado
     * @param integer $estado_idestado
     * @return mixed
     */
    public function actionDelete($idabogado, $estado_idestado)
    {
        $this->findModel($idabogado, $estado_idestado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Abogado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idabogado
     * @param integer $estado_idestado
     * @return Abogado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idabogado, $estado_idestado)
    {
        if (($model = Abogado::findOne(['idabogado' => $idabogado, 'estado_idestado' => $estado_idestado])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
