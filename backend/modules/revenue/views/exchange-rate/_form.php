<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\ExchangeRate $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="exchange-rate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'currencyId')->textInput() ?>

    <?= $form->field($model, 'currencySymbol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rateAmt')->textInput() ?>

    <?= $form->field($model, 'startDate')->textInput() ?>

    <?= $form->field($model, 'endDate')->textInput() ?>

    <?= $form->field($model, 'recordBy')->textInput() ?>

    <?= $form->field($model, 'recordDate')->textInput() ?>

    <?= $form->field($model, 'updatedBy')->textInput() ?>

    <?= $form->field($model, 'updateDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
