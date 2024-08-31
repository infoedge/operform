<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\purchases\models\OrderItem $model */

$this->title = Yii::t('app', 'Purchase Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Order Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-item-sales">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_allProductsForm', [
        'models' => $models,
        'saleitems' => $saleitems,
    ]) ?>

</div>
