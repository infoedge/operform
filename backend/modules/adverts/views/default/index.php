<?php
use yii\helpers\Url;

$this->title = Yii::t('app', 'Adverts');

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="adverts-default-index">
    
    <h1><?= $this->title ?></h1>
    <div class="row">
        <div class="col-md-3 d-grid gap-2">
            <a class="btn btn-lg btn-info btn-block" href="<?= Url::toRoute(['ad-campaign/index']) ?>">Ad Campaigns</a>
            <a class="btn btn-lg btn-info btn-block" href="<?= Url::toRoute(['ad-pay-type/index']) ?>">Advert Pay Types</a>
            <a class="btn btn-lg btn-info btn-block" href="<?= Url::toRoute(['advert/index']) ?>">Advert</a>
            <a class="btn btn-lg btn-info btn-block" href="<?= Url::toRoute(['ad-antics/index']) ?>">Advert Animation Types</a>
        </div><!-- comment -->
    </div>
</div>
