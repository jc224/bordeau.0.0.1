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
        'web/admin/css/style-responsive.css',
        'web/admin/summernote/summernote-lite.min.css',
		'web/admin/js/datatable/css/demo_table.css',
		'web/admin/css/style.css',
		'web/admin/css/style-responsive.css',
		'web/admin/css/custom.css',

    ];
    public $js = [
        'web/admin/js/jquery-ui-1.9.2.custom.min.js',
		'web/admin/js/jquery-migrate-1.2.1.min.js',
		'web/admin/js/bootstrap.min.js',
		'web/admin/js/modernizr.min.js',
		'web/admin/js/jquery.nicescroll.js',
		'web/admin/js/scripts.js',

	    'web/admin/js/datatable/jquery.dataTables.js',
		'web/admin/js/datatable/DT_bootstrap.js',
		'web/admin/js/datatable/dynamic_table_init.js',
        'web/admin/js/jquery-3.5.1.min.js',
        'web/admin/js/bootstrap.min.js',
        'web/admin/js/modernizr.min.js',
		'web/admin/tagplug/index.js',

        'web/admin/js/jquery.counterup.js',
		'web/admin/js/jquery.waypoints.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap5\BootstrapAsset'
    ];


	
}
