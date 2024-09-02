<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use app\modules\adverts\models\Advert;
use app\modules\adverts\models\AdPayType;
use app\modules\adverts\assets\MyAdvertAssets;

/** @var yii\web\View $this */
/** @var app\modules\adverts\models\AdCampaign $model */
/** @var yii\widgets\ActiveForm $form */
MyAdvertAssets::register($this);
?>

<div class="ad-campaign-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-3"><?= $form->field($model, 'adId')->dropDownList(ArrayHelper::map(Advert::find()->all(), 'id', 'FullAdvertName'),['prompt'=>'..Pick an Advert..']) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'adPayTypeId')->dropDownList(ArrayHelper::map(AdPayType::find()->all(),'id','adPayTypeName'),['prompt'=>'..Pick a Pay Type..']) ?></div>

    <div class="col-md-3">
            <?= $form->field($model, 'myStartDate')->textInput() ?>
            <?= $form->field($model, 'startDate')->hiddenInput()->label('') ?>
            <!--   <?=
            $form->field($model, 'myStartDate')->widget(DatePicker::className(), [
                'options' => [
                    'attribute' => 'myStartDate',
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

    <!--<div class="col-md-3"><?= $form->field($model, 'requestedBy')->textInput() ?></div>-->
</div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
