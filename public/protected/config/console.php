<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Console Application',
    // preloading 'log' component
    'preload' => array('log'),
    'commandMap' => array(
        'migrate' => array(
            'class' => 'system.cli.commands.MigrateCommand',
            'migrationPath' => 'application.migrations',
            'migrationTable' => 'tbl_migration',
            'connectionID' => 'db',
        /* 'templateFile'=>'application.migrations.template', */
        ),
    ),
    // application components
    'components' => array(
        'db' => require(dirname(__FILE__).'/db.php'),
        'testdb' =>array(
          'connectionString' => 'mysql:host=localhost;dbname=thsea_dev',
          'emulatePrepare' => true,
          'username' => 'thsea_dev',
          'password' => 'password',
          'charset' => 'utf8',
          'tablePrefix' => '',
          'enableProfiling' => true
      ),
        // uncomment the following to use a MySQL database
        /*
          'db'=>array(
          'connectionString' => 'mysql:host=localhost;dbname=testdrive',
          'emulatePrepare' => true,
          'username' => 'root',
          'password' => '',
          'charset' => 'utf8',
          ),
         */
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
);