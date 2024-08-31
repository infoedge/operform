<?php
use yii\helpers\Url;

$this->title = Yii::t('app', 'General Settings');

$this->params['breadcrumbs'][] = $this->title;

?>
<div class="general-default-index">
    <h1><?= Yii::t('app', $this->title); ?></h1>
    <div class="row">
        <div class="col-md-3 d-grid gap-2">
            <a class="btn btn-lg btn-info btn-block" href="<?= Url::toRoute(['interests/index']) ?>">Interests</a>
            <a class="btn btn-lg btn-info btn-block" href="<?= Url::toRoute(['interest-groups/index']) ?>">Interest Groups</a>
            <br/>
            <br/>
        </div>
        <div class="col-md-3 d-grid gap-2">
            <a class="btn btn-lg btn-warning btn-block" href="<?= Url::toRoute(['country/index']) ?>">Countries</a>
            <a class="btn btn-lg btn-warning btn-block" href="<?= Url::toRoute(['regions/index']) ?>">Regions</a>
            <a class="btn btn-lg btn-warning btn-block" href="<?= Url::toRoute(['towns/index']) ?>">UrbanCenters</a>
        </div>
        <div class="col-md-3 d-grid gap-2">
            <a class="btn btn-lg btn-success btn-block" href="<?= Url::toRoute(['job-titles/index']) ?>">Job Titles</a>
            <a class="btn btn-lg btn-success btn-block" href="<?= Url::toRoute(['industry/index']) ?>">Industry</a>
            <a class="btn btn-lg btn-success btn-block" href="<?= Url::toRoute(['industry-group/index']) ?>">Industry Group</a>
        </div>
        
        <div class="col-md-3 d-grid gap-2">
            <a class="btn btn-lg btn-danger btn-block" href="<?= Url::toRoute(['/menu/creator']) ?>">Menu</a>
            <a class="btn btn-lg btn-danger btn-block" href="<?= Url::toRoute(['sys-constants/index']) ?>">System Constants</a>
            <br/>
            <br/>
            
        </div>
    </div>
    
</div>
