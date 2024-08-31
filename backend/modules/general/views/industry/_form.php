<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use backend\modules\general\models\IndustryGroup;

/** @var yii\web\View $this */
/** @var backend\modules\general\models\Industry $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="industry-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6"><?= $form->field($model, 'grpId')->dropDownList(ArrayHelper::map(IndustryGroup::find()->all(),'id','grpName'),['prompt'=> '.. Pick an Industry Type ..']) ?></div>

            <div class="col-sm-6"><?= $form->field($model, 'industryName')->textInput(['maxlength' => true]) ?></div>
    </div>
    

    <div class="form-group">
        <br/><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
