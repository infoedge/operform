<?php

use yii\helpers\Html;
use yii\helpers\Url;


/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\ProductItem $model */

$this->title = Yii::t('app', 'Add Product Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products and Revenue'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-item-create">

    <h1><?= Html::encode($this->title) ?></h1>
<!--    <h3><?= substr( Url::base(),0,strlen( Url::base())-3). 'modules/revenue/assets/uploads/' ?></h3>
    <h4><?= Url::base() ?></h4>-->
    <?= $this->render('_form', [
        'model' => $model,
        'filemodel'=> $filemodel,
    ]) ?>

</div>
