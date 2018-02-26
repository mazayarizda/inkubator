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
        'css/easy-responsive-tabs.css',
        'css/flexslider.css',
        'css/font-awesome.css',
        'css/jquery-ui.css',
        'css/style.css',
        'css/team.css',

    ];
    public $js = [
        'js/bootstrap.js',
        'js/easy-responsive-tabs.js',
        'js/imagezoom.js',
        'js/jquery.countup.js',
        'js/jquery.easing.min.js',
        'js/jquery.flexslider.js',
        'js/jquery.waypoints.min.js',
        'js/jquery-ui.js',
        'js/minicart.min.js',
        'js/modernizr.custom.js',
        'js/move-top.js',
        'js/responsiveslides.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',

    ];
}
