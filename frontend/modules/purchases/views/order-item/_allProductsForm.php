<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\purchases\models\OrderItem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-item-form">

    <?php $form = ActiveForm::begin(); ?>

<?php foreach($models as $i=>$model){  ?>  
<div class="row">
    
    <div class="col-md-3"><?= $form->field($model, '[$i]priceListId')->checkbox(['style'=>'display:inline'])->label($model->priceList->product->productName) ?></div>

    <div class="col-md-1"><?= $form->field($model, '[$i]quantity')->dropDownList([1=>'1',2=>'2',3=>'3',4=>'4',6=>'6']) ?></div>
    <div class="col-sm-2"><?= 'Price</br>($ US)</br>'.$model->productPrice ?></div>
    
    <div class="col-md-2"><?= $form->field($model, '[$i]totalAmt')->textInput() ?></div>

    <div class="col-md-2"><?= $form->field($model, '[$i]requiresDelivery')->radioList([0=>'No',1=>'Yes']) ?></div>
    
    <div class="col-md-2">
        <?= $form->field($model, '[$i]isCancelled')->checkbox() ?>
        <?= $form->field($model, '[$i]cancelDate')->hiddenInput()->label('') ?>
    </div><!-- comment -->
    
</div>
    <hr>
<?php } ?>
    <div class="form-group">
        <br/><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
