<?php

namespace backend\modules\revenue\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MyPriceAssets extends AssetBundle
{
    
    public $sourcePath = __DIR__;
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/pricelist.js',
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
