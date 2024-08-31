<?php
use yii\helpers\Url;

$this->title = Yii::t('app', 'Articles');

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-default-index">
    <h1><?= $this->title ?></h1>
    <div class="row">
        <div class="col-md-3 d-grid gap-2">
            <a class="btn btn-lg btn-primary btn-block" href="<?= Url::toRoute(['article/index']) ?>">Articles</a>
            <a class="btn btn-lg btn-primary btn-block" href="<?= Url::toRoute(['category/index']) ?>">Categories</a>
            <a class="btn btn-lg btn-primary btn-block" href="<?= Url::toRoute(['publish-states/index']) ?>">Publish States</a>
            <a class="btn btn-lg btn-primary btn-block" href="<?= Url::toRoute(['article-display/index']) ?>">Article Display</a>
        </div><!-- comment -->
    </div>
</div>
