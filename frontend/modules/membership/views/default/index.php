<?php 
use yii\helpers\Url;
use yii\helpers\Html;
//use Yii;

use frontend\modules\membership\assets\MyDashboardAssets;

$this->title=Yii::t("app","Dashboard");
MyDashboardAssets::register($this);
?>
<div class="membership-default-index">
    <div class="row" >
        <div class="col-md-12 text-center" >
            <h1><?= $this->title ?></h1>
            
        </div>
    </div>
    <div class="row advert1 curved-border">
        .
    </div>
    <div class="row msg-area-top curved-border">
        .
    </div>
    <div class="row">
        <div class="col-md-3 advert-lft curved-border ">
            
            <h3>Member Details</h3>
            <div class="row bg-grey">
                    <div class="col-sm-4"><strong>Member Name</strong></div>
                    <div class="col-sm-8"> <?=$model->memberFullName ?></div>
            </div>
            <div class="row">
                    <div class="col-sm-4"><strong>E-mail</strong></div>
                    <div class="col-sm-8"><?= $model->email ?></div>
            </div>
            <div class="row bg-grey">
                    <div class="col-sm-4"><strong>Phone</strong></div>
                    <div class="col-sm-8"><?= $model->phone ?></div>
            </div>
            <div class="row">
                    <div class="col-sm-4"><strong>Interests</strong></div>
                    <div class="col-sm-8"><?= $model->interests ?></div>
            </div>
            <div class="row bg-grey">
                    <div class="col-sm-4"><strong>Change Interests</strong></div>
                    <div class="col-sm-8">
                        <a class="btn btn-lg btn-info btn-block" href="<?= Url::toRoute(['/membership/members/change-interests','id'=>$model->memberId]) ?>">Interests</a>
                    </div>
            </div>
            
            <div class="col-auto ">
            <h4>Social Media</h4>
            <ul class="social-links">
                <li><?= Html::a(Html::img(Url::to('@web/images/icons/facebook1.png'),['width'=>'50px']),Url::to('https://www.facebook.com/profile.php?id=100083043083518&mibextid=JRoKGi'))?></li>
                <li><?= Html::a(Html::img(Url::to('@web/images/icons/x-logo2.png'),['width'=>'50px']),Url::to('https://x.com/home'))?></li>
                <li><?= Html::a(Html::img(Url::to('@web/images/icons/youtube1.png'),['width'=>'50px']),Url::to('https://youtube.com/@theoptimumperformance?si=2LhEw4ex1NB4nvxu'))?></li>
            </ul>
            
        </div>
        </div>
        <div class="col-md-7">
            <?= Yii::$app->articledisplay->featuredArticles(); ?>
        </div><!-- comment -->
        <div class="col-md-2 advert-rgt curved-border">
            .
        </div>
    </div>
    <br/>
    <div class="row">
        
        
         <?= Yii::$app->articledisplay->otherArticles(1); ?>   
        
    </div>
</div>
