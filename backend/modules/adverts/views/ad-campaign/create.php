<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\adverts\models\AdCampaign $model */

$this->title = Yii::t('app', 'Create Ad Campaign');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ad Campaigns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-campaign-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
