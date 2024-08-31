<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\PackingTypes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="packing-types-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'packTypeName')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <br/><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
