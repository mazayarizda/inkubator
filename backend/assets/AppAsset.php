<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/components.css',
        'css/core.css',
        'css/icons.css',
        'css/menu.css',
        'css/pages.css',
        'css/responsive.css',
        'css/variables.css',
        'css/pace-theme-flash.css',

    ];
    public $js = [
        'js/detect.js',
        'js/yii_override.js',
        'js/fastclick.js',
        'js/jquery.app.js',
        'js/jquery.blockUI.js',
        'js/jquery.core.js',
        'js/jquery.nicescroll.js',
        'js/jquery.scrollTo.min.js',
        'js/jquery.slimscroll.js',
        'js/modernizr.min.js',
        'js/pace.min.js',
        'js/waves.js',
        'js/wow.min.js',
        'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js',
        'https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
        'yii2mod\alert\AlertAsset',
    ];
}
