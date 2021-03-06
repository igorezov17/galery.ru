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
class AppImage extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/app.css',
        //'css/style.css',
        'css/bulma.css',
        'css/app.css',
        'css/bootstrap.min.css',  
        'css/slide.css', 
        // 'css/bootstrap.min.css',
        // 'css/style.css',

        //'css/style.css',
    ];
    public $js = [
        'js/scripts.js',
    ];
   /* public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];*/
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
