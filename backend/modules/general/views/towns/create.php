<?php

use yii\helpers\Html;
use backend\modules\general\assets\MyLocationAssets;

/** @var yii\web\View $this */
/** @var backend\modules\general\models\Towns $model */

$this->title = Yii::t('app', 'Add Town');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Towns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

MyLocationAssets::register($this);
?>
<div class="towns-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
