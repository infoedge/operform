<?php

namespace frontend\modules\purchases\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MyPurchasesAssets extends AssetBundle
{
    
    public $sourcePath = __DIR__;
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [  
    ];
    public $js = [
        'js/orders.js'
    ];
    public $images = [
    ];
    public $files = [  
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
