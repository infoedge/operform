<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\PackingTypes $model */

$this->title = Yii::t('app', 'Add Packing Types');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products and Revenue'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Packing Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packing-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
