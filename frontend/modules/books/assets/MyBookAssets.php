<?php

namespace frontend\modules\books\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MyBookAssets extends AssetBundle
{
    
    public $sourcePath = __DIR__;
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/TreineticEpubReader.css'
    ];
    public $js = [
        'js/TreineticEpubReader.js',
        'js/epub.js',
        'js/main.js'
    ];
    public $images = [
        'images/optimum-performance-logo-header.jpg',
        'images/plussign.png',
        'images/plussign-pushed.png',
    ];
    public $files = [
        'ebooks/epub_1.epub'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
