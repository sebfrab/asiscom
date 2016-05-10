<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\General */

$this->title = 'Create General';
$this->params['breadcrumbs'][] = ['label' => 'Generals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="general-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
