<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\general\models\Regions $model */

$this->title = Yii::t('app', 'Create Regions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'General Settings'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
