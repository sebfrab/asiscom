<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Abogado */

$this->title = $model->idabogado;
$this->params['breadcrumbs'][] = ['label' => 'Abogados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abogado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idabogado' => $model->idabogado, 'estado_idestado' => $model->estado_idestado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idabogado' => $model->idabogado, 'estado_idestado' => $model->estado_idestado], [
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
            'idabogado',
            'nombres',
            'apellidos',
            'contacto',
            'estado_idestado',
        ],
    ]) ?>

</div>
