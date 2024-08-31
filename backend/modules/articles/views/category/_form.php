<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\modules\articles\models\Category;
/** @var yii\web\View $this */
/** @var app\modules\articles\models\Category $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-3"><?= $form->field($model, 'categoryName')->textInput(['maxlength' => true]) ?></div>

        <div class="col-md-2"><?= $form->field($model, 'parentCat')->dropDownList(ArrayHelper::map(Category::find()->all(),'id','categoryName'),['prompt'=>'..Pick Parent Category..']) ?></div>

        <div class="col-md-3"><?= $form->field($model, 'categoryDescription')->textarea(['rows' => 6]) ?></div>

        <div class="col-md-2"><?= $form->field($model, 'catOrder')->textInput() ?></div>

        <div class="col-md-2"><?= $form->field($model, 'featured')->radioList([0=>'No',1=>'Yes']) ?></div>

    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
