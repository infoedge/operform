<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;


use app\modules\articles\models\Category;
use app\modules\articles\models\PublishStates;
use app\modules\articles\models\Members;
use app\modules\articles\assets\MyArticleAssets;


/** @var yii\web\View $this */
/** @var app\modules\articles\models\Article $model */
/** @var yii\widgets\ActiveForm $form */
MyArticleAssets::register($this);
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    
    <div class="col-md-3"><?= $form->field($model, 'articleTitle')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'catId')->dropDownList(ArrayHelper::map(Category::find()->where(['NOT Like','id',2])->all(),'id','categoryName'),['prompt'=>'..Pick Parent Category..']) ?></div>

    <div class="col-md-6">
        <!--<?= $form->field($model, 'articleNarration')->textarea(['rows' => 6]) ?>-->
        <?= \coderius\pell\Pell::widget([
            'model' => $model,
            'attribute' => 'articleNarration',
            ]);
        ?>
        
    </div>

    <!--<div class="col-md-3"><?= $form->field($model, 'articleIntro')->textarea(['rows' => 6]) ?></div>-->
</div>
<div class="row">
    <div class="col-md-3"><?= $form->field($model, 'articleIntroImg')->textInput(['maxlength' => true]) ?></div>

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

    <div class="col-md-3"><?= $form->field($model, 'myEndDate')->textInput() ?>
            <?= $form->field($model, 'endDate')->hiddenInput()->label() ?>
    </div>
    </div>
<div class="row">
    <div class="col-md-3"><?= $form->field($model, 'author')->dropDownList(ArrayHelper::map(Members::find()->all(),'id','FullMemberName'),['prompt'=>'..Pick an author..']) ?></div>

    <div class="col-md-3"><?= $form->field($model, 'published')->dropDownList(ArrayHelper::map(PublishStates::find()->all(),'id','pubStateName')) ?>
   
    </div>
    
    <div class="col-md-3"><?= $form->field($model, 'articleOrder')->textInput() ?></div>

    <div class="col-md-3"><?= $form->field($model, 'featured')->radioList([0=>'No',1=>'Yes']) ?></div>
</div>
 

    <div class="form-group">
        <br/><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
