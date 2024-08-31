<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use app\modules\adverts\assets\MyAdvertAssets;
use app\modules\adverts\models\Members;
use app\modules\adverts\models\AdAntics;

/** @var yii\web\View $this */
/** @var app\modules\adverts\models\Advert $model */
/** @var yii\widgets\ActiveForm $form */
MyAdvertAssets::register($this);
?>

<div class="advert-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-3"><?= $form->field($model, 'ownerId')->dropDownList(ArrayHelper::map(Members::find()->all(),'id','FullMemberName'),['prompt'=>'..Pick a Member\'s Name..']) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'adTitle')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'adNarrative')->textarea(['rows' => 6]) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'entranceAnticId')->dropDownList(ArrayHelper::map(AdAntics::find()->all(),'id','anticName'),['prompt'=>'..Pick and Animation Type..']) ?></div>
</div>
<div class="row">
    <div class="col-md-3"><?= $form->field($model, 'outAnticId')->dropDownList(ArrayHelper::map(AdAntics::find()->all(),'id','anticName'),['prompt'=>'..Pick and Animation Type..']) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'ibanner')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-3">
            <?= $form->field($model, 'myAdStartDate')->textInput() ?>
            <?= $form->field($model, 'adStartDate')->hiddenInput()->label('') ?>
             <!--   <?=
            $form->field($model, 'myAdStartDate')->widget(DatePicker::className(), [
                'options' => [
                    'attribute' => 'myAdStartDate',
                    //'class'=>'cust-form',
                    'aria-label' => 'Start Date',
                    'placeholder' => 'yyyy/mm/dd',
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
            <?= $form->field($model, 'myAdEndDate')->textInput() ?>
            <?= $form->field($model, 'adEndDate')->hiddenInput()->label('') ?>
    </div>
</div>
    

    <div class="form-group">
        <br/><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
