<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\ProductType $model */

$this->title = Yii::t('app', 'Add Product Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products and Revenue'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-type-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?=  Yii::$app->useful->makeStrCode('Hard Copy Book') ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
