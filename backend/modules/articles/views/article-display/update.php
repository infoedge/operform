<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\articles\models\ArticleDisplay $model */

$this->title = Yii::t('app', 'Update Article Display: {name}', [
    'name' => $model->cat->categoryName,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article Display'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="article-display-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
