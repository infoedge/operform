<?php
/** @var yii\web\View $this */
$this->title = Yii::t('app', 'Academy');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashbord'), 'url' => ['/membership/default/index']];
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Services'), 'url' => ['/training/services/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container academy-index">
    <h1><?= Yii::t("app",$this->title) ?></h1>
    <?= 
       Yii::$app->purchasedetails->displayProduct(3,2);
    ?>
</div>
