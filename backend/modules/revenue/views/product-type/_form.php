<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\revenue\assets\MyProductAssets;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\ProductType $model */
/** @var yii\widgets\ActiveForm $form */

MyProductAssets::register($this);
?>

<div class="product-type-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    <div class="col-md-6"><?= $form->field($model, 'productTypeName')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-6"><?= $form->field($model, 'productCode')->textInput(['maxlength' => true,'disabled'=>null]) ?></div>
    </div>
    <div class="form-group">
        </br><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
