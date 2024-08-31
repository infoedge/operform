<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\articles\models\PublishStates $model */

$this->title = Yii::t('app', 'Create Publish States');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Publish States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publish-states-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
