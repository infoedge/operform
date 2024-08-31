<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\general\models\Country $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        
    <div class="col-md-3"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-2"><?= $form->field($model, 'symbol')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-2"><?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-2"><?= $form->field($model, 'currencyCode')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-1"><?= $form->field($model, 'dialCode')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-2"><?= $form->field($model, 'countryFlag')->textInput(['maxlength' => true]) ?></div>
    
    </div>
    <div class="form-group">
        <br/><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
