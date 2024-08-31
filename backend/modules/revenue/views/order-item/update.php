<?php

use yii\helpers\Html;
use backend\modules\revenue\assets\MyOrderItemAssets;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\OrderItem $model */

$this->title = Yii::t('app', 'Update Order Item: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Order Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
MyOrderItemAssets::register($this);
?>
<div class="order-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
