<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\General */

$this->title = 'Update General: ' . ' ' . $model->idgeneral;
$this->params['breadcrumbs'][] = ['label' => 'Generals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idgeneral, 'url' => ['view', 'id' => $model->idgeneral]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="general-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
