<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\OrderDelivery $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-delivery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orderItemId')->textInput() ?>

    <?= $form->field($model, 'deliveryTown')->textInput() ?>

    <?= $form->field($model, 'deliveryMode')->textInput() ?>

    <?= $form->field($model, 'deliveryDate')->textInput() ?>

    <?= $form->field($model, 'deliveryAmt')->textInput() ?>

    <?= $form->field($model, 'recordDate')->textInput() ?>

    <?= $form->field($model, 'updatedBy')->textInput() ?>

    <?= $form->field($model, 'updateDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
