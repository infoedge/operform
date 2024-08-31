<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\ProductItemSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'productName') ?>

    <?= $form->field($model, 'productTypeId') ?>

    <?= $form->field($model, 'producer') ?>

    <?= $form->field($model, 'packingId') ?>

    <?php // echo $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'version') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'hasExpiry') ?>

    <?php // echo $form->field($model, 'expiryPeriod') ?>

    <?php // echo $form->field($model, 'recordBy') ?>

    <?php // echo $form->field($model, 'recordDate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
