<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/styles.css',
        'css/animate.css',
        'css/jquery.fancybox.min.css'
    ];
    public $js = [
        'js/programmer/initial-config.js',
        'js/bundle.js',
        'js/programmer/formValidationOnSubmit.js',
        'js/programmer/programmer.js',
        'js/programmer/translate-ua.js',
        'js/noty/packaged/jquery.noty.packaged.js',
        'js/jquery.fancybox.min.js',
        'js/main.js'
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];

//    public $jsOptions = [
//        'position' => View::POS_HEAD,
//    ];
}
