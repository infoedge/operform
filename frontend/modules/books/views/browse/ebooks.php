<?php
/** @var yii\web\View $this */
use frontend\modules\books\assets\MyBookAssets;
//use yii\helpers\Url;


$this->title = Yii::t('app', 'E-Books');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashbord'), 'url' => ['/membership/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['/books/browse/index']];
$this->params['breadcrumbs'][] = $this->title;

MyBookAssets::register($this);
?>
<div class="container e-books">
    <h1><?= Yii::t("app",$this->title) ?></h1>
    <?= 
       Yii::$app->purchasedetails->displayProduct(1,2);
    ?>
</div>
