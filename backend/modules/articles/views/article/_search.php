<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\articles\models\ArticleSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="article-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'articleTitle') ?>

    <?= $form->field($model, 'catId') ?>

    <?= $form->field($model, 'articleNarration') ?>

    <?= $form->field($model, 'articleIntro') ?>

    <?php // echo $form->field($model, 'articleIntroImg') ?>

    <?php // echo $form->field($model, 'publishDate') ?>

    <?php // echo $form->field($model, 'startDate') ?>

    <?php // echo $form->field($model, 'endDate') ?>

    <?php // echo $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'editor') ?>

    <?php // echo $form->field($model, 'editDate') ?>

    <?php // echo $form->field($model, 'published') ?>

    <?php // echo $form->field($model, 'publisher') ?>

    <?php // echo $form->field($model, 'articleOrder') ?>

    <?php // echo $form->field($model, 'featured') ?>

    <?php // echo $form->field($model, 'recordBy') ?>

    <?php // echo $form->field($model, 'recordDate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
