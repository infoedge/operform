<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\general\models\Towns $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="towns-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'regionId')->textInput() ?>

    <?= $form->field($model, 'townName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'geoNameId')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
