<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\articles\models\ArticleDisplaySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="article-display-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'catId') ?>

    <?= $form->field($model, 'leadingArticles') ?>

    <?= $form->field($model, 'cols') ?>

    <?= $form->field($model, 'articleRows') ?>

    <?php // echo $form->field($model, 'linkRows') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
