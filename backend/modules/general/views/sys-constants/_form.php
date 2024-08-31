<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\general\models\SysConstants $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sys-constants-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-4"><?= $form->field($model, 'constantName')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-4"><?= $form->field($model, 'constantValue')->textInput() ?></div>

    <div class="col-md-4"><?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?></div>
</div>
    <div class="form-group">
        <br/><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
