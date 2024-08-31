<?php

use yii\helpers\Html;

use backend\modules\general\assets\MyInterestAssets;

/** @var yii\web\View $this */
/** @var backend\modules\general\models\Interests $model */

$this->title = Yii::t('app', 'Add Interests');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'General Settings'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Interests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

MyInterestAssets::register($this);
?>
<div class="interests-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
