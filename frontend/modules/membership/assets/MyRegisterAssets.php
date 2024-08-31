<?php

namespace frontend\modules\membership\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MyRegisterAssets extends AssetBundle
{
    
    public $sourcePath = __DIR__;
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/register.js',
    ];
    public $images = [
        'images/optimum-performance-logo-header.jpg',
        'images/plussign.png',
        'images/plussign-pushed.png',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
