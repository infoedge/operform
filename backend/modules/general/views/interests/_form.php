<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use backend\modules\general\models\InterestGroups;

/** @var yii\web\View $this */
/** @var backend\modules\general\models\Interests $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="interests-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-3"><?= $form->field($model, 'interestGroupId')->dropDownList(ArrayHelper::map(InterestGroups::find()->all(), 'id', 'groupName'),['prompt'=>'..Pick a Group..']) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'interestName')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-3">
            <?= $form->field($model, 'myStartDate')->textInput() ?>
            
            <?= $form->field($model, 'startDate')->hiddenInput()->label('') ?>
            <!--<?= '<label class="control-label" for="interests-startdate"> &nbsp Date of Birth </label>' ?>
            <?=
            $form->field($model, 'myStartDate')->widget(DatePicker::className(), [
                'options' => [
                    'attribute' => 'myStartDate',
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

    <div class="col-md-3">
            <?= $form->field($model, 'myEndDate')->textInput() ?>
            <?= $form->field($model, 'endDate')->hiddenInput()->label('') ?>
    </div>
</div>
    <div class="form-group">
        <br/><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
