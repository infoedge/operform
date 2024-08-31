<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


use backend\modules\revenue\models\PriceList;
use backend\modules\revenue\assets\MyOrderItemAssets;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\OrderItem $model */
/** @var yii\widgets\ActiveForm $form */
MyOrderItemAssets::register($this);
?>

<div class="order-item-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <?= $form->field($model, 'ordersId')->hiddenInput()->label('') ?>

    <div class="col-md-4"><?= $form->field($model, 'priceListId')->dropDownList(ArrayHelper::map(PriceList::find()->all(),'id','FullProductName'),['prompt'=>'..Pick a product..']) ?></div>

    <div class="col-md-4"><?= $form->field($model, 'quantity')->textInput() ?></div>

    <div class="col-md-4"><?= $form->field($model, 'totalAmt')->textInput(['disabled'=>'disabled']) ?></div>
</div>
<div class="row">
    <div class="col-md-4"><?= $form->field($model, 'requiresDelivery')->radioList([0=>'No',1=>'Yes']) ?></div>
   
    <div class="col-md-4"><?= $form->field($model, 'isCancelled')->radioList([0=>'No',1=>'Yes']) ?></div>

    <div class="col-md-4"><?= $form->field($model, 'cancelDate')->textInput() ?></div>
</div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
</div>
