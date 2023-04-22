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
                md5('site_acount')=>'site/acount',
                md5('site_recherche')=>'site/recherche',
                md5('site_contact')=>'site/contact',
                md5('site_login')=>'site/login',
                md5('site_card')=>'site/card',
                md5('site_statuts')=>'site/statuts',
                md5('site_paiement')=>'site/paiement',
                md5('site_commande')=>'site/commande',
                md5('site_deconnection')=>'site/deconnection',
                md5('site_compte')=>'site/compte',
                md5('site_produit').'/<id:\w+>'=>'site/produit',
                md5('site_dashboard')=>'site/dashboard',
                md5('site_categorie').'/<id:\w+>'=>'site/categorie',

                

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
