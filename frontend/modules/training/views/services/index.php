<?php
/** @var yii\web\View $this */
$this->title = Yii::t('app', 'Services');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashbord'), 'url' => ['/membership/default/index']];
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Services'), 'url' => ['/training/services/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<h1><?= $this->title ?></h1>

<?= Yii::$app->articledisplay->otherArticles(3); ?>

</div>