<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\DiscountTypes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="discount-types-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
     
    <div class="col-md-6"><?= $form->field($model, 'discountTypeName')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-6"><?= $form->field($model, 'discountAmtPC')->textInput() ?></div>

</div>   

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
