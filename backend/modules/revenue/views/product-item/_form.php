<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use backend\modules\revenue\models\ProductType;
use backend\modules\revenue\models\PackingTypes;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\ProductItem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-item-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="row">
    <div class="col-md-3"><?= $form->field($model, 'productName')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'productTypeId')->dropDownList(ArrayHelper::map(ProductType::find()->all(),'id','FullProductTypeName'),['prompt'=>'..Select Product Type..']) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'producer')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'packingId')->dropDownList(ArrayHelper::map(PackingTypes::find()->orderBy('id ASC')->all(),'id','packTypeName'),['prompt'=>'..Select Packing Type..']) ?></div>
</div>
<div class="row">
    <div class="col-md-2"><?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-1"><?= $form->field($model, 'version')->textInput(['maxlength' => true]) ?></div>
    
    <div class="col-md-3"><?= $form->field($filemodel, 'imageFile')->fileInput() ?></div>

    <div class="col-md-3"><?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?></div>

    <div class="col-md-1"><?= $form->field($model, 'hasExpiry')->radioList([0=>'No',1=>'Yes']) ?></div>

    <div class="col-md-2"><?= $form->field($model, 'expiryPeriod')->textInput() ?></div>
</div>

    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
