<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '&*()@A^)!(%^&*)@#$%^&*(*^%$_SDF$%^&%^',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        //compponnets
        'pageClass'=>[
            'class'=>'app\components\pageClass',
        ],

           //compponnets
        'searchClass'=>[
            'class'=>'app\components\searchClass',
        ],
        'adminClass'=>[
            'class'=>'app\components\adminClass',
        ],

        'sslcommerzClass'=>[
            'class'=>'app\components\sslcommerzClass',
        ],

        'homeClass'=>[
            'class'=>'app\components\homeClass',
        ],

        'dashboardClass'=>[
            'class'=>'app\components\dashboardClass',
        ],  
        'controllerClass'=>[
            'class'=>'app\components\controllerClass',
        ],

        'commandeClass'=>[
            'class'=>'app\components\commandeClass',
        ],

        'eloquantClass'=>[
            'class'=>'app\components\eloquantClass',
        ],
            
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                md5('site_index')=>'site/index',
                md5('site_changepassword')=>'site/changepassword',
                md5('site_login')=>'site/login',
                md5('site_dashboard')=>'site/dashboard',

                md5('admin_crateslidbar')=>'admin/crateslidbar',
                md5('admin_listeslidbar')=>'admin/listeslidbar',
                md5('admin_updateslider')=>'admin/updateslider',

                md5('admin_produit')=>'param/produit',
                md5('admin_updatecat')=>'admin/updatecat',
                md5('admin_creatcategorie')=>'admin/creatcategorie',
                md5('admin_listcategorie')=>'admin/listcategorie',
                md5('admin_client')=>'admin/client',
                md5('admin_suivie')=>'admin/suivie',

                md5('admin_subcategorie')=>'admin/subcategorie',
                md5('admin_listesubcat')=>'admin/listesubcat',

            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
