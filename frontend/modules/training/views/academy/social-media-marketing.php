<?php
/** @var yii\web\View $this */
use yii\helpers\Url;

$this->title = Yii::t('app', 'Social Media Marketing Academy');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashbord'), 'url' => ['/membership/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Academy'), 'url' => ['/training/academy/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Yii::t("app",$this->title) ?></h1>
<div class="books-default-index">
    
    <!--<h3>Route: <?= Url::base().'/../modules/training/academyfiles/CRYPTOCURRENCYKNOWLEDGE.pdf' ?></h3>-->
    
    <?php
        echo \lesha724\documentviewer\ViewerJsDocumentViewer::widget([
            'url' => Url::base().'/../modules/training/academyfiles/IntroductionToSocialMediaMarketing.pdf', //url на ваш документ или http://example.com/test.odt
            
            'width'=>'100%',
            'height'=>'800px',
            
    ]);?>
    
</div>
