<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\adverts\models\AdvertSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="advert-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ownerId') ?>

    <?= $form->field($model, 'adTitle') ?>

    <?= $form->field($model, 'adNarrative') ?>

    <?= $form->field($model, 'entranceAnticId') ?>

    <?php // echo $form->field($model, 'outAnticId') ?>

    <?php // echo $form->field($model, 'banner') ?>

    <?php // echo $form->field($model, 'adStartDate') ?>

    <?php // echo $form->field($model, 'adEndDate') ?>

    <?php // echo $form->field($model, 'recordBy') ?>

    <?php // echo $form->field($model, 'recordDate') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <?php // echo $form->field($model, 'updateDate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
