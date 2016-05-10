<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model common\models\General */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="general-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'dato')->widget(Widget::className(), [
            'settings' => [
                'lang' => 'es',
                'minHeight' => 200,
                'buttons' => ['bold'],
            ]
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
