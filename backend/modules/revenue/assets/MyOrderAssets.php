<?php

namespace backend\modules\revenue\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MyOrderAssets extends AssetBundle
{
    
    public $sourcePath = __DIR__;
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'css/revenue.css',
    ];
    public $js = [
        'js/orders.js',
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
