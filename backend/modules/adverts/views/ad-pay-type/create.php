<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\adverts\models\AdPayType $model */

$this->title = Yii::t('app', 'Create Ad Pay Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ad Pay Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-pay-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
