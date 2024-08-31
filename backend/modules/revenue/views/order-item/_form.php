<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\revenue\models\PriceList;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\OrderItem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ordersId')->hiddenInput() ?>

    <?= $form->field($model, 'priceListId')->dropDownList(ArrayHelper::map(PriceList::find()->all(),'id','FullProductName'),['prompt'=>'..Pick a product..']) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'totalAmt')->textInput() ?>

    <?= $form->field($model, 'requiresDelivery')->radioList([0=>'No',1=>'Yes']) ?>
   
    <?= $form->field($model, 'isCancelled')->radioList([0=>'No',1=>'Yes']) ?>

    <?= $form->field($model, 'cancelDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
