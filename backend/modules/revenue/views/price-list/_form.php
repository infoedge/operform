<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use backend\modules\revenue\models\ProductItem;
use backend\modules\revenue\assets\MyPriceAssets;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\PriceList $model */
/** @var yii\widgets\ActiveForm $form */
MyPriceAssets::register($this);
?>

<div class="price-list-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4"><?= $form->field($model, 'productId')->dropDownList(ArrayHelper::map(ProductItem::find()->all(),'id','FullProductTypeName'),['prompt'=>'..Pick a Product..']) ?></div>

        <div class="col-md-2"><?= $form->field($model, 'price')->textInput() ?></div>

        <div class="col-md-3"><?= $form->field($model, 'myStartDate')->textInput() ?>
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

        <div class="col-md-3">
            <?= $form->field($model, 'myEndDate')->textInput() ?>
            <?= $form->field($model, 'endDate')->hiddenInput()->label('') ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
