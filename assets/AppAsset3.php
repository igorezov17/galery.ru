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
class AppAsset3 extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/AdminLTE.min',
        'css/bootstrap.min.css',
        'css/dataTables.bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/ionicons.min.css',
        'css/select2.min.css',
        'css/skin-purple.min.css',
        'css/walstyl.css',



        //'css/style.css',
    ];
    public $js = [
        //'js/scripts.js',
    ];
   /* public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];*/
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
