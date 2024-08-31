<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\general\models\JobTitles $model */

$this->title = Yii::t('app', 'Add Job Title');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'General Settings'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Job Titles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-titles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
