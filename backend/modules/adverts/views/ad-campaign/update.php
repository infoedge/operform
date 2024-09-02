<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\adverts\models\AdCampaign $model */

$this->title = Yii::t('app', 'Edit Ad Campaign: {name}', [
    'name' => $model->ad,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Adverts'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ad Campaigns'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="ad-campaign-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
