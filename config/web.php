<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'Zipa Photo Agency',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],

    'modules' => [
        'user' => [
	        'class' => 'dektrium\user\Module',
            'enableAccountDelete' => true,
            'enableUnconfirmedLogin' => true,
            'admins' => ['milivojeivic12'],
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',

	    'actionlog' => [
		    'class' => 'cakebake\actionlog\Module',
		],
    ],

    /* Components */

    'components' => [
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'sr',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],


        'request' => [
            'cookieValidationKey' => 'testCookie',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
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
        'db' => require(__DIR__ . '/db.php'),
		    'urlManager' =>[
			    'enablePrettyUrl'=> true,
			    'showScriptName'=> false
		    ],

    ],
    'as beforeRequest' => [
        'class' => 'app\beforeLoad\beforeRequest',
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
