<?php


use yii\bootstrap5\Html;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

/* @var $this yii\web\View */
/* @var $content string */


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <header>
        
    </header>
    <main>
        <?= $content ?>
    </main>
    
    <footer>Optimum Performance &copy; <?= date("Y")?> </footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>