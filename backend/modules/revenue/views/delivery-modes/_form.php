<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\DeliveryModes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="delivery-modes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'deliveryTypeName')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
