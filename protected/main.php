<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Wedding Photographer',

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
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'/san-francisco-wedding-photographer-blog/<cat:[a-zA-Z0-9-]+>/<alias:[a-zA-Z0-9-]+>_<id:[0-9]+>.html'=>'blogs/detail',
				'/san-francisco-wedding-photographer-blog/<cat:[a-zA-Z0-9-]+>_<id:[0-9]+>.html'=>'blogs/cat',
				'/san-francisco-wedding-photographer-blog/<date:[a-zA-Z0-9-]+>.html'=>'blogs/bydate',
				'/san-francisco-wedding-photographer-blog.html'=>'blogs/index',
				
				'/about-home-for-brides.html'=>'about/index',
				'/about-home-for-brides/<alias:[a-zA-Z0-9-]+>_<id:[0-9]+>.html'=>'about/detail',
				'/about-our-team.html'=>'about/subcat',
				
				'/san-francisco-wedding-photography-price.html'=>'price/index',
				'/san-francisco-wedding-photography-price/<alias:[a-zA-Z0-9-]+>_<id:[0-9]+>.html'=>'price/detail',
				
				'/san-jose-wedding-photographer.html'=>'resource/index',
				'/san-jose-wedding-photographer/<alias:[a-zA-Z0-9-]+>_<id:[0-9]+>.html'=>'resource/detail',	
				

				'/san-francisco-wedding-photography/<alias:[a-zA-Z0-9-]+>_<id:[0-9]+>.html'=>'gallery/cat',
				'/san-francisco-wedding-photography/<subcat:[a-zA-Z0-9-]+>/<alias:[a-zA-Z0-9-]+>_<id:[0-9]+>.html'=>'gallery/album',
				'/san-francisco-wedding-photography/<subcat:[a-zA-Z0-9-]+>/<alias:[a-zA-Z0-9-]+>_<id:[0-9]+>_<photo:[0-9]+>.html'=>'gallery/detail',
				'/portfolio-photography/<alias:[a-zA-Z0-9-]+>_<id:[0-9]+>.html'=>'gallery/portfolio',
				
				'/san-francisco-wedding-videographer.html'=>'videography/index',
				'/san-francisco-wedding-videographer/<alias:[a-zA-Z0-9-]+>_<id:[0-9]+>_<page:[0-9]+>.html'=>'videography/cat',
				'/san-francisco-wedding-videographer/<alias:[a-zA-Z0-9-]+>_<id:[0-9]+>.html'=>'videography/detaillist',
				'/san-francisco-wedding-videographer/<subcat:[a-zA-Z0-9-]+>/<alias:[a-zA-Z0-9-]+>_<id:[0-9]+>.html'=>'videography/detail',	
				
				'/san-francisco-makeup-artist.html'=>'makeup/index',
				'/san-francisco-makeup-artist/<alias:[a-zA-Z0-9-]+>_<id:[0-9]+>_<page:[0-9]+>.html'=>'makeup/cat',
				'/san-francisco-makeup-artist/<cat:[a-zA-Z0-9-]+>/<alias:[a-zA-Z0-9-]+>_<id:[0-9]+>_<photo:[0-9]+>.html'=>'makeup/detail',	
				
				
				'/contact-us.html'=>'site/contact',	
				'/thank-you.html'=>'site/thankyou',	
				'/site_album.html'=>'site/album',
			),
		),
		
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
		'blogpageSize'=>20,
		'Blog'=>5,
		'About'=>3,
		'Price'=>2,
		'Resource'=>4,
		'Gallery'=>6,
		'Videography'=>9,
		'Makeup'=>1,
		'CatPageSize'=>21,
		'PhotosPerPage'=>50,
		'adminEmail'=>'webmaster@example.com',
		'securCode'=>'d#$DFtgdsg#$#$%FDSgfdst!@@#+_)!',
		'domain'=>'http://v2.homeforbrides.com',
		'domain2'=>'http://homeforbrides.com',
	),

);