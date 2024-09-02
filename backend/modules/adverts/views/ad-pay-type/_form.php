<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\adverts\models\AdPayType $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ad-pay-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'adPayTypeName')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <br/><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
