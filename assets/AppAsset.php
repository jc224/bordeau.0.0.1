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
		'admin/css/style-responsive.css',
        'admin/summernote/summernote-lite.min.css',
		'admin/js/datatable/css/demo_table.css',
		'admin/css/style.css',
		'admin/css/style-responsive.css',
		'admin/css/custom.css',



    ];
    public $js = [

        'admin/js/jquery-ui-1.9.2.custom.min.js',
		'admin/js/jquery-migrate-1.2.1.min.js',
		'admin/js/bootstrap.min.js',
		'admin/js/modernizr.min.js',
		'admin/js/jquery.nicescroll.js',
		'admin/js/scripts.js',

	    'admin/js/datatable/jquery.dataTables.js',
		'admin/js/datatable/DT_bootstrap.js',
		'admin/js/datatable/dynamic_table_init.js',
        'admin/js/jquery-3.5.1.min.js',
        'admin/js/bootstrap.min.js',
        'admin/js/modernizr.min.js',
		'admin/tagplug/index.js',

        'admin/js/jquery.counterup.js',
		'admin/js/jquery.waypoints.min.js',

        'admin/summernote/summernote-lite.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
