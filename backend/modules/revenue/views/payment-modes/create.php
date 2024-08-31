<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\PaymentModes $model */

$this->title = Yii::t('app', 'Create Payment Modes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payment Modes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-modes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
