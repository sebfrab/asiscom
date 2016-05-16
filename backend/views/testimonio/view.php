<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Testimonio */

$this->title = $model->idtestimonio;
$this->params['breadcrumbs'][] = ['label' => 'Testimonios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idtestimonio' => $model->idtestimonio, 'estado_idestado' => $model->estado_idestado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idtestimonio' => $model->idtestimonio, 'estado_idestado' => $model->estado_idestado], [
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
            'idtestimonio',
            'persona',
            'cargo',
            'testimonio:ntext',
            'estado_idestado',
        ],
    ]) ?>

</div>
