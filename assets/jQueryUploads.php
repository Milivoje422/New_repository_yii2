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
class jQueryUploads extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		'jQuery_uploads/css/jquery.fileupload.css',
	];

	public $js = [
		'jQuery_uploads/js/angular.js',
		'jQuery_uploads/js/cors/jquery.postmessage-transport.js',
		'jQuery_uploads/js/cors/jquery.xdr-transport.js',

		'jQuery_uploads/js/vendor/jquery.ui.widget.js',

		'jQuery_uploads/js/jquery.fileupload.js',
		'jQuery_uploads/js/jquery.fileupload-angular.js',

		'jQuery_uploads/js/image.all.min.js',
		'jQuery_uploads/js/nvas-to-blod.min.js',

		'jQuery_uploads/js/jquery.iframe-transport.js',

		'jQuery_uploads/js/jquery.fileupload-process.js',
		'jQuery_uploads/js/jquery.fileupload-image.js',

		'jQuery_uploads/js/jquery.fileupload-validate.js',
		'jQuery_uploads/js/jquery.fileupload-ui.js',
		'jQuery_uploads/js/jquery.fileupload-video.js',
		'jQuery_uploads/js/main.js',
		'jQuery_uploads/js/app.js',
		'jQuery_uploads/js/jquery.fileupload-audio.js',
		'jQuery_uploads/js/jquery.blueimp-gallery.min.js',

	];

	public $depends = [
		'app\assets\AppAsset',
	];
}
