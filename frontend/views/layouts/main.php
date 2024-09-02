<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use host33\multilevelhorizontalmenu\MultilevelHorizontalMenu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <div class="row">
        <div class="col-sm-8">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);
    
    ?>
        </div>
        <col-md-3>
    <?php
    if (!Yii::$app->user->isGuest && Yii::$app->memberdetails->isMember()) {
    echo MultilevelHorizontalMenu::widget(
            array(
                "menu"=>array(
                    array("url"=>array(
                                       "route"=>"/membership/default/index"),
                                       "label"=>"Dashboard"),
                  array("url"=>array("route"=>"/training/services/index"),
                               "label"=>"Services",
                          array("url"=>array(
                                       "route"=>"/training/services/atraining"),
                                       "label"=>"Training",),
                          array("url"=>array(
                                      "route"=>"/training/services/mentorship"),
                                      "label"=>"Mentorship",),
                         array("url"=>array(
                                      "route"=>"/training/services/counselling"),
                                      "label"=>"Counselling",),
//                          array("url"=>array(),
//                                       "label"=>"View Products",
//                          array("url"=>array(
//                                       "route"=>"/product/show",
//                                       "params"=>array("id"=>3),
//                                       "htmlOptions"=>array("title"=>"title")),
//                                       "label"=>"Product 3"),
//                            array("url"=>array(),
//                                         "label"=>"Product 4",
//                                array("url"=>array(
//                                             "route"=>"/product/show",
//                                             "params"=>array("id"=>5)),
//                                             "label"=>"Product 5")))
                      ),
                          
                          array("url"=>array(
                                       "route"=>"/training/academy/index"),
                                       "label"=>"Academy",
                                        array("url"=>array('route'=>'/training/academy/crypto-currency'),
                                                             "label"=>"Crypto Currency",
                                            
                                       ),
                                       array("url"=>array('route'=>'/training/academy/forex-trading'),
                                                             "label"=>"Forex Trading",
                                       ),
                                       array("url"=>array('route'=>'/training/academy/social-media-marketing'),
                                                             "label"=>"Social Media Marketing",
                                       ),
                                       array("url"=>array('route'=>'/training/academy/online-business'),
                                                             "label"=>"Online Business Opportumities",
                                       ),
                                       array("url"=>array('route'=>'/training/academy/network-marketing'),
                                                             "label"=>"Network Marketing",
                                       ),
                                       array("url"=>array('route'=>'/training/academy/job-seeking'),
                                                             "label"=>"Job Seeking Skills",
                                       ),
                              ),
                          array("url"=>array(
                              "route"=>"/books/browse/index"
                          ),
                                       "label"=>"Books",
                                                array("url"=>array(
//                                                             "link"=>"http://www.yiiframework.com",
//                                                             "htmlOptions"=>array("target"=>"_BLANK")
                                                                'route'=>'/books/browse/hard-copy',
                                                             ),
                                                             "label"=>"Hard Copy Books"),
                                                array("url"=>array(
                                                    'route'=>'/books/browse/ebooks'
                                                ),
                                                             "label"=>"E-Books",
//                                                array("url"=>array(
//                                                             "route"=>"/books/books/ebooks",),),
                                                    ),),
                                       //"params"=>array("id"=>3),
//                                       "htmlOptions"=>array("title"=>"title")),
//                                       "label"=>"Men"),
//                            array("url"=>array(),
//                                         "label"=>"Women",
//                                array("url"=>array(
//                                             "route"=>"/product/scarves",
//                                             "params"=>array("id"=>5)),
//                                             "label"=>"Scarves"))),
//                              array("url"=>array(
//                                           "route"=>"site/menuDoc"),
//                                           "label"=>"Disabled Link",
//                                                                   "disabled"=>true),
//                                )
                          ),
                )
    );
    
    }
    ?>       
    </div>
    <div class="col-sm-2">
    <?php
    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        //echo Html::tag('div',Html::a('Dashboard',['/membership/default/index'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>
    </div>
    </<div>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        
        <p class="float-end"><?= \coderius\hitCounter\widgets\hitCounter\HitCounterWidget::widget([]); ?></p>
        
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
