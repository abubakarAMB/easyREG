<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

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
        'css/site.css',
        'css/font-awesome.css',
        'css/AdminLTE.min.css',
        'css/skin-blue.min.css',
        'css/pnotify.css',
        'css/jquery.multiselect.css',
    ];
    public $js = [
        'js/demo.js',
        'js/custom.js',
        'js/main.js',
        'js/app.min.js',
        'js/jquery.multiselect.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
