<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\general\models\IndustryGroup $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="industry-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'grpName')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <br/><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
