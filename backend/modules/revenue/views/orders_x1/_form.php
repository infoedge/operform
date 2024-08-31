<?php
use backend\modules\revenue\assets\MyOrderAssets;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;


use backend\modules\revenue\models\Members;
use backend\modules\revenue\models\Country;
use backend\modules\revenue\models\Regions;
use backend\modules\revenue\models\Towns;
use backend\modules\revenue\models\DeliveryModes;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\Orders $model */
/** @var yii\widgets\ActiveForm $form */
MyOrderAssets::register($this);
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-2"><?= $form->field($model, 'memberId')->dropDownList(ArrayHelper::map(Members::find()->all(),'id','FullMemberName'),['prompt'=>'..Select Member Name..']) ?></div>

    <div class="col-md-2">
            <?= $form->field($model, 'myOrderDate')->textInput() ?>
            <?= $form->field($model, 'orderDate')->hiddenInput()->label('') ?>
         <!--   <?=
            $form->field($model, 'myOrderDate')->widget(DatePicker::className(), [
                'options' => [
                    'attribute' => 'myOrderDate',
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
    <div class="col-md-2"><?= '<br/>'.Html::button(Yii::t("app","Add Order Item"),['class'=>'btn btn-block btn-secondary']) ?></div>
    <div class="col-md-2"><?= $form->field($model, 'orderAmt')->textInput() ?></div>
</div>
<div class="row group-form-items">
    
    <h4>Delivery Details</h4>
    <div class="col-md-2"><?= $form->field($model, 'myCountry')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','name'),['prompt'=>'..Pick Delivery Country..']) ?></div><!-- comment -->
    
    <div class="col-md-2"><?= $form->field($model, 'myRegion')->dropDownList(ArrayHelper::map(Regions::find()->all(),'id','regionName'),['prompt'=>'..Pick Delivery Region..']) ?></div>

    <div class="col-md-2"><?= $form->field($model, 'deliveryTown')->dropDownList(ArrayHelper::map(Towns::find()->all(),'id','townName'),['prompt'=>'..Pick Delivery Town..']) ?></div>

    <div class="col-md-2"><?= $form->field($model, 'deliveryMode')->dropDownList(ArrayHelper::map(DeliveryModes::find()->all(),'id','deliveryTypeName'),['prompt'=>'..Pick a Delivery Mode..']) ?></div>
      
    <div class="col-md-2">
            <?= $form->field($model, 'myDeliveryDate')->textInput() ?>
            <?= $form->field($model, 'deliveryDate')->hiddenInput()->label('') ?>
    </div>
    
</div>

    <div class="form-group">
        <br/><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
