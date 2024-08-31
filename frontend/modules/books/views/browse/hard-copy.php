<?php
//use Yii;

/** @var yii\web\View $this */
$this->title = Yii::t('app', 'Hard Copy Books');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashbord'), 'url' => ['/membership/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['/books/browse/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container hard-copy-books">
    <h1><?= Yii::t("app",$this->title) ?></h1>
    <?= 
       Yii::$app->purchasedetails->displayProduct(2,2);
    ?>
</div>