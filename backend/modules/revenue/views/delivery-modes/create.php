<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\DeliveryModes $model */

$this->title = Yii::t('app', 'Add Delivery Mode');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products and Revenue'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Delivery Modes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-modes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
