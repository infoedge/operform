<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;

use app\modules\articles\models\Category;

/** @var yii\web\View $this */
/** @var app\modules\articles\models\ArticleDisplay $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="article-display-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-2"><?= $form->field($model, 'catId')->dropDownList(ArrayHelper::map(Category::find()->all(),'id','categoryName'),['prompt'=>'..Pick a Category..']) ?></div>

    <div class="col-md-2"><?= $form->field($model, 'leadingArticles')->textInput() ?></div>

    <div class="col-md-2"><?= $form->field($model, 'cols')->textInput() ?></div>

    <div class="col-md-2"><?= $form->field($model, 'articleRows')->textInput() ?></div>

    <div class="col-md-1"><?= $form->field($model, 'linkRows')->textInput() ?></div>
    
    <div class="col-md-2"><?= $form->field($model, 'articleOrder')
            ->dropDownList([1=>'Publish Date (LIFO)',2=>'Ordered Article (Ascending)',3=>'Authored Date (Descending)'],['prompt'=>'..Pick an Ordering']) ?></div>
</div>
    <div class="form-group">
        <br/><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
