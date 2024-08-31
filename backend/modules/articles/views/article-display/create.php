<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\articles\models\ArticleDisplay $model */

$this->title = Yii::t('app', 'Create Article Display');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article Display'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-display-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
