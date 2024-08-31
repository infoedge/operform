<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\OrderDelivery $model */

$this->title = Yii::t('app', 'Create Order Delivery');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Order Deliveries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-delivery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
