<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\PaymentsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="payments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'invoiceId') ?>

    <?= $form->field($model, 'pmtModeId') ?>

    <?= $form->field($model, 'transId') ?>

    <?= $form->field($model, 'pmtDate') ?>

    <?php // echo $form->field($model, 'pmtCurrency') ?>

    <?php // echo $form->field($model, 'exchRate') ?>

    <?php // echo $form->field($model, 'amtPaid') ?>

    <?php // echo $form->field($model, 'recordBy') ?>

    <?php // echo $form->field($model, 'recordDate') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <?php // echo $form->field($model, 'updateDate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
