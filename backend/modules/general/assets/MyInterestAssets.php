<?php

namespace backend\modules\general\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MyInterestAssets extends AssetBundle
{
    
    public $sourcePath = __DIR__;
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/date_issues.js',
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
