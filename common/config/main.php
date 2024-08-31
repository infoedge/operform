<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'useful' =>[
            'class' => 'common\components\Useful',
        ],
        'memberdetails'=>[
            'class'=>'common\components\MemberDetails',
        ],
        'reordering'=>[
            'class'=>'common\components\Reordering',
        ],
        'articledisplay'=>[
            'class'=>'common\components\ArticleDisplay',
        ],
        'epubhandler'=>[
            'class'=>'common\components\BookGluttonEpub',
        ],
        'purchasedetails'=>[
            'class'=>'common\components\PurchaseDetails',
        ],
    ],
    'modules' => [
        'pdfjs' => [
            'class' => '\yii2assets\pdfjs\Module',
        ],
        $conf = [
            
        ],
    
        $conf['modules']['hitCounter'] = [
            'class' => 'coderius\hitCounter\Module',
        ],

        $conf['bootstrap'][] = 'coderius\hitCounter\config\Bootstrap',
    ],
];
