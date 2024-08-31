<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\helpers\Url;
use yii\bootstrap5\Modal;




use backend\modules\revenue\assets\MyOrderAssets;
use backend\modules\revenue\models\Members;



/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\Orders $model */
/** @var yii\widgets\ActiveForm $form */
MyOrderAssets::register($this);
?>

<div class="orders-form">
<?php
    Modal::begin([
        "title"=>"<h4>Add Order Item</h4>",
        "id"=>"modal",
        "size"=>"modal-lg"
    ]);
    echo "<div id='modal-content'></div>";
    Modal::end();
    ?>
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
    <div class="col-md-2"><?= (empty($model->id)?'':'<br/>'.Html::button(Yii::t("app","Add Order Item"),['class'=>'btn btn-block btn-secondary','id'=>'modalBtn','value'=>Url::to(['order-item/add-order-item','orderId'=>$model->id])])) ?></div>
    
    <div class="col-md-2"><?= $form->field($model, 'orderAmt')->textInput(['disabled'=>'disabled']) ?></div>
    
    <div class="col-md-2"><?= $form->field($model, 'requiresDelivery')->radioList([0=>'No',1=>'Yes']) ?>

    </div>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', (empty($model->id)?'Start Order':'Save Order')), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
