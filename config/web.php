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
//	    'imagemanager' => [
//		    'class' => 'noam148\imagemanager\Module',
//		    //set accces rules ()
//		    'canUploadImage' => true,
//		    'canRemoveImage' => function(){
//			    return true;
//		    },
//		    //add css files (to use in media manage selector iframe)
//		    'cssFiles' => [
//			    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css',
//		    ],
//	    ],
    ],

    /* Components */

    'components' => [
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'sr-SR',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
//	    'imagemanager' => [
//		    'class' => 'noam148\imagemanager\components\ImageManagerGetPath',
//		    //set media path (outside the web folder is possible)
//		    'mediaPath' => '/path/where/to/store/images/media/imagemanager',
//		    //path relative web folder to store the cache images
//		    'cachePath' => 'assets/images',
//		    //use filename (seo friendly) for resized images else use a hash
//		    'useFilename' => true,
//		    //show full url (for example in case of a API)
//		    'absoluteUrl' => false,
//	    ],

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
