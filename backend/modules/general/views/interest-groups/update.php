<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\general\models\InterestGroups $model */

$this->title = Yii::t('app', 'Edit Interest Group: {name}', [
    'name' => $model->groupName,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'General Settings'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Interest Groups'), 'url' => ['index']];

$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="interest-groups-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
