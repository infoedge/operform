<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\membership\models\Members $model */

$this->title = Yii::t('app', 'Change Interests for: {name}', [
    'name' => $model->fullMemberName,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashboard'), 'url' => ['default/index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="members-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_interests', [
        'model' => $model,
    ]) ?>

</div>
