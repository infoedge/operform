<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\general\models\Regions;
use backend\modules\general\models\Country;

/** @var yii\web\View $this */
/** @var backend\modules\general\models\Towns $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="towns-form">

    <?php $form = ActiveForm::begin(); ?>

    
<div class="row">
    
    <div class="col-md-3"><?= $form->field($model, 'countryId')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','name'),['prompt'=>'..Pick a Country..']) ?></div>
    
    <div class="col-md-3"><?= $form->field($model, 'regionId')->dropDownList(ArrayHelper::map(Regions::find()->all(),'id','regionName'),['prompt'=>'..Pick a region..']) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'townName')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-2"><?= $form->field($model, 'geoNameId')->textInput(['maxlength' => true]) ?></div>
</div>
    <div class="form-group">
        <br/><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
