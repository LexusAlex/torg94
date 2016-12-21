<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/jquery.arcticmodal-0.3.css',
        "css/font-awesome.css",
        "css/slick.css",
        "css/jquery.formstyler.css",
        "css/bootstrap.css",
        "css/style.css"
    ];
    public $js = [
        "js/jquery-3.1.0.min.js",
        "js/jquery.arcticmodal-0.3.min.js",
        "js/Chart.min.js",
        "js/bootstrap.js",
        "js/jquery.maskedinput.min.js",
        "js/slick.js",
        "js/jquery.validate.min.js",
        "js/additional-methods.min.js",
        "js/anonym.js"
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
