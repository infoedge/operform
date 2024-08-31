<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\PaymentModes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="payment-modes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pmtTypeName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'startDate')->textInput() ?>

    <?= $form->field($model, 'endDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
