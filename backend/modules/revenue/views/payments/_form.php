<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\Payments $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="payments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'invoiceId')->textInput() ?>

    <?= $form->field($model, 'pmtModeId')->textInput() ?>

    <?= $form->field($model, 'transId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pmtDate')->textInput() ?>

    <?= $form->field($model, 'pmtCurrency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'exchRate')->textInput() ?>

    <?= $form->field($model, 'amtPaid')->textInput() ?>

    <?= $form->field($model, 'recordBy')->textInput() ?>

    <?= $form->field($model, 'recordDate')->textInput() ?>

    <?= $form->field($model, 'updatedBy')->textInput() ?>

    <?= $form->field($model, 'updateDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
