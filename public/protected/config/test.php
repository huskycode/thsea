<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
                'import' => array(
                    'application.models.*',
                    'application.components.*',
                    'ext.*',
                    'application.controllers.*',
                ),
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
			/* uncomment the following to provide test database connection
			'db'=>array(
			    'connectionString' => 'mysql:host=localhost;dbname=thsea_dev',
    			'emulatePrepare' => true,
    			'username' => 'root',
    			'password' => 'admin',
    			'charset' => 'utf8',
    			'tablePrefix' => '',
    			'enableProfiling' => true
			),
			*/
		),
	)
);
