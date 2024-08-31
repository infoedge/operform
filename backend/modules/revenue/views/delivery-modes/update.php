<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\DeliveryModes $model */

$this->title = Yii::t('app', 'Edit Delivery Modes: {name}', [
    'name' => $model->deliveryTypeName,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products and Revenue'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Delivery Modes'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="delivery-modes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
