<?php

namespace app\modules\adverts\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MyAdvertAssets extends AssetBundle
{
    
    public $sourcePath = __DIR__;
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'css/advert.css',
    ];
    public $js = [
        'js/advert.js',
    ];
    public $images = [
        'images/plussign.png',
        'images/plussign-pushed.png',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
