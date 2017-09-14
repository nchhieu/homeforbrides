<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'HomeForBrides Admin ',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.helpers.*',
		'application.components.*',
	),
	'language'=>'en',
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'hieunguyen',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array($_SERVER['REMOTE_ADDR'],'::1'),
		),
	),

	// application components
	'components'=>array(
		'session' => array (
			'class' => 'system.web.CDbHttpSession',
			'connectionID' => 'db',
			'sessionTableName' => 'tbl_session',
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'image'=>array(
          'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            'params'=>array('directory'=>'D:/projects/homeforbrides.com_new2/ImageMagick'),
        ),
		'mail' => array(
			'class' => 'ext.yii-mail.YiiMail',
			'transportType' => 'smtp',
			'transportOptions' => array(
				'host' => 'smtp.gmail.com',
				'username' => 'homeforbrides@gmail.com',
				'password' => 'pose',
				'port' => '465',
				'encryption'=>'tls',
			),
			'viewPath' => 'application.views.mail',
			'logging' => true,
			'dryRun' => false
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=homeforbrides2.db.7489302.hostedresource.com;dbname=homeforbrides2',
			'emulatePrepare' => true,
			'username' => 'homeforbrides2',
			'password' => 'ABCD@123com',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
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
	'params'=>array(
		'pageSize'=>50,
		'HomeGallery'=>815,
		'adminEmail'=>'webmaster@example.com',
		'securCode'=>'d#$DFtgdsg#$#$%FDSgfdst!@@#+_)!',
		'domain'=>'http://homeforbrides.com',
	),

);