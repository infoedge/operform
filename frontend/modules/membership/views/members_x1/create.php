<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\membership\models\Members $model */

$this->title = Yii::t('app', 'Create Members');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
