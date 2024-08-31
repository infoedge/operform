<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\Invoices $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="invoices-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orderId')->textInput() ?>

    <?= $form->field($model, 'invoiceDate')->textInput() ?>

    <?= $form->field($model, 'discountType')->textInput() ?>

    <?= $form->field($model, 'discountAmt')->textInput() ?>

    <?= $form->field($model, 'totalAmtDue')->textInput() ?>

    <?= $form->field($model, 'totalAmtPaid')->textInput() ?>

    <?= $form->field($model, 'recordBy')->textInput() ?>

    <?= $form->field($model, 'recordDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
