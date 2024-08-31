<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\general\models\Industry $model */

$this->title = Yii::t('app', 'Edit Industry: {name}', [
    'name' => $model->industryName,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'General Settings'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Industries'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="industry-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
