<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Thailand Software Engineering Academy',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'gii1234',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
        'admin',
        'user'=>array(
            'loginUrl'=>array('login'),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        'cache'=>array(
            'class' => 'system.caching.CFileCache',
        ),
        /*
        'assetManager' => array(
            'class' => 'application.extensions.SafeModeAssetManager',
        ),
         */
        // uncomment the following to enable URLs in path-format
        /*'urlManager' => array(
            'showScriptName' => false,
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),*/
        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'rules'=>array(
                ''=>'site/index',
                'gii'=>'gii',
                'video/<idOrUrlName>'=>'site/detail',
                'list'=>'site/list',
                'login'=>'site/login',
                'logout'=>'site/logout',
                'page'=>'site/page',
                '<controller:\w+>'=>'<controller>/index',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
                '<controller:\w+>/<id:\d+>/<title>'=>'<controller>/view',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
            ),
        ),
        'db' => require(dirname(__FILE__).'/db.php'),
        /*
          'db'=>array(
          'connectionString'=>'sqlite:'.dirname(__FILE__).'/../data/thsea_video.db'
          ),
         */
        // uncomment the following to use a MySQL database
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@seacademy.in.th',
        'videoListPageSize' => '15',
        'videoTagHorizontalList' => array('Workshop'=>1, 'Exp-Sharing'=>2,'Agile Thailand 2013'=>3),
        'videoTagVerticalList' => array('Beginner'=>2, 'Technical'=>2, 'Lean'=>1),
    ),
);