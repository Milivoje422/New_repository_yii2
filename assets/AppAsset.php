<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
	    'css/bs_css/bootstrap.css',
	    '//fonts.googleapis.com/css?family=Lora:400,700',
    ];

	public $js = [
		'js/googleAnalistic.js',
		'js/customJs.js',
		'js/jquery.dd.js',
//		'js/bs_js/tether.min.js',
//		'js/bs_js/bootstrap.js',

	];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
