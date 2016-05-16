<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Cliente */

$this->title = $model->idcliente;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idcliente' => $model->idcliente, 'estado_idestado' => $model->estado_idestado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idcliente' => $model->idcliente, 'estado_idestado' => $model->estado_idestado], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idcliente',
            'nombre',
            'descripcion',
            'estado_idestado',
        ],
    ]) ?>

</div>
