<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cliente */

$this->title = 'Update Cliente: ' . ' ' . $model->idcliente;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcliente, 'url' => ['view', 'idcliente' => $model->idcliente, 'estado_idestado' => $model->estado_idestado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cliente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
