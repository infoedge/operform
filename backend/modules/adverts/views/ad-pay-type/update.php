<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\adverts\models\AdPayType $model */

$this->title = Yii::t('app', 'Edit Ad Pay Type: {name}', [
    'name' => $model->adPayTypeName,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Adverts'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ad Pay Types'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="ad-pay-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
