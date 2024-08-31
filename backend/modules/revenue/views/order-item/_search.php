<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\OrderItemSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ordersId') ?>

    <?= $form->field($model, 'priceListId') ?>

    <?= $form->field($model, 'quantity') ?>

    <?= $form->field($model, 'totalAmt') ?>

    <?php // echo $form->field($model, 'isCancelled') ?>

    <?php // echo $form->field($model, 'cancelDate') ?>

    <?php // echo $form->field($model, 'requiresDelivery') ?>

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
