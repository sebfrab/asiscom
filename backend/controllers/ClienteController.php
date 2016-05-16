<?php

namespace backend\controllers;

use Yii;
use common\models\Cliente;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClienteController implements the CRUD actions for Cliente model.
 */
class ClienteController extends Controller
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
     * Lists all Cliente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Cliente::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cliente model.
     * @param integer $idcliente
     * @param integer $estado_idestado
     * @return mixed
     */
    public function actionView($idcliente, $estado_idestado)
    {
        return $this->render('view', [
            'model' => $this->findModel($idcliente, $estado_idestado),
        ]);
    }

    /**
     * Creates a new Cliente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cliente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idcliente' => $model->idcliente, 'estado_idestado' => $model->estado_idestado]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cliente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idcliente
     * @param integer $estado_idestado
     * @return mixed
     */
    public function actionUpdate($idcliente, $estado_idestado)
    {
        $model = $this->findModel($idcliente, $estado_idestado);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idcliente' => $model->idcliente, 'estado_idestado' => $model->estado_idestado]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cliente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idcliente
     * @param integer $estado_idestado
     * @return mixed
     */
    public function actionDelete($idcliente, $estado_idestado)
    {
        $this->findModel($idcliente, $estado_idestado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cliente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idcliente
     * @param integer $estado_idestado
     * @return Cliente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idcliente, $estado_idestado)
    {
        if (($model = Cliente::findOne(['idcliente' => $idcliente, 'estado_idestado' => $estado_idestado])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
