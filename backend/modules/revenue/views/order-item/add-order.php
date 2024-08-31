<?php

use yii\helpers\Html;


/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\OrderItem $model */

$this->title = Yii::t('app', 'Add Order Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Order Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="order-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
