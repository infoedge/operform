<?php
/** @var yii\web\View $this */
$this->title = Yii::t('app', 'Books');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashbord'), 'url' => ['/membership/default/index']];
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['/books/browse/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Yii::t("app",$this->title) ?></h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
