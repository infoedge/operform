<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use frontend\modules\membership\models\Country;
use frontend\modules\membership\models\Regions;
use frontend\modules\membership\models\Towns;
use frontend\modules\membership\models\Interests;

/** @var yii\web\View $this */
/** @var frontend\modules\membership\models\Members $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="members-form">

    <?php $form = ActiveForm::begin(); ?>

   <div class="row"> 

    <div class="col-md-2"><?= $form->field($model, 'surname')->textInput(['maxlength' => true,'disabled'=>'disabled']) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'otherNames')->textInput(['maxlength' => true,'disabled'=>'disabled']) ?></div>

    <div class="col-md-1"><?= $form->field($model, 'gender')->radioList(['M'=>'Male','F'=>'Female'],['disabled'=>'disabled']) ?></div>

    <div class="col-md-2">
            <?= $form->field($model, 'myDob')->textInput(['disabled'=>'disabled']) ?>
            <?= $form->field($model, 'dob')->hiddenInput()->label('') ?>
            
            <!--<?= '<label class="control-label" for="interests-startdate"> &nbsp Date of Birth </label>' ?>
            <?=
            $form->field($model, 'myDob')->widget(DatePicker::className(), [
                'options' => [
                    'attribute' => 'myDob',
                    //'class'=>'cust-form',
                    'aria-label' => 'Start Date',
                    'placeholder' => 'dd/mm/yyyy',
                ],
                'clientOptions' => [
                    'value' => null,
                    'autoClose' => true,
                    'dateFormat' => 'dd/mm/yy',
//                'changeYear' =>true,
//                'changeMonth'=>true,
                    'showButtonPanel' => true,
                //'showOn' => 'button',
                //'buttonImage' => 'images/calendar.png',
                //'buttonImageOnly' => true
                ]
            ])->label('')
            ?>-->
    </div>
    
    <div class="col-md-4"><?= $form->field($model, 'email')->textInput(['disabled'=>'disabled']) ?></div>
   </div>
    <div class="row">
        <div class="col-md-3"><?= $form->field($model, 'countryId')->dropDownList(ArrayHelper::map(Country::find()->all(), 'id', 'name'),['prompt'=>'..Pick Your Country..','disabled'=>'disabled']) ?></div>
        
        <div class="col-md-3"><?= $form->field($model, 'regionId')->dropDownList(ArrayHelper::map(Regions::find()->orderBy('regionName ASC')->all(), 'id', 'regionName'),['prompt'=>'..Pick Your Region..','disabled'=>'disabled']) ?></div>
        
    <div class="col-md-3"><?= $form->field($model, 'townId')->dropDownList(ArrayHelper::map(Towns::find()->all(),'id','townName'),['prompt'=>'..Pick Your City/Town..','disabled'=>'disabled']) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'phoneNo')->textInput(['maxlength' => true,'disabled'=>'disabled']) ?></div>

    

    </div>
    <div class="row">
        <div class="col-md-12"> 
            <br/><?= $form->field($model, 'theInterest')->checkboxList(ArrayHelper::map(Interests::find()->all(),'id','interestName'),['unselect'=>true]) ?>  
            <!--<br/><?= print_r($model->theInterest)?>-->
        </div>
       
    </div>
    <div class="form-group">
        <br/><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
