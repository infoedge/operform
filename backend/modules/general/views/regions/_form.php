<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use backend\modules\general\models\Country;

/** @var yii\web\View $this */
/** @var backend\modules\general\models\Regions $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="regions-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-4"><?= $form->field($model, 'countryId')->dropDownList(ArrayHelper::map(Country::find()->all(), 'id', 'name'),['prompt'=>'..Pick a Country..']) ?></div>

    <div class="col-md-4"><?= $form->field($model, 'regionName')->textInput(['maxlength' => true]) ?></div>
</div>
    <div class="form-group">
        <br/><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
