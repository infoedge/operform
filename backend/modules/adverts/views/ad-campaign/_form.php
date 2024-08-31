<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\adverts\models\AdCampaign $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ad-campaign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'adId')->textInput() ?>

    <?= $form->field($model, 'adPayTypeId')->textInput() ?>

    <?= $form->field($model, 'startDate')->textInput() ?>

    <?= $form->field($model, 'requestedBy')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
