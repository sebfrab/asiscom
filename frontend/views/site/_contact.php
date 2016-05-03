<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

?>
<div class="site-contact">

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                
            <div class="col-lg-6 col-md-6 col-sm-6">
                <?= $form->field($model, 'name')->textInput() ?>
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-6">
                <?= $form->field($model, 'email') ?>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?= $form->field($model, 'subject') ?>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-9">{input}</div></div>',
                ]) ?>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary pull-right', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
