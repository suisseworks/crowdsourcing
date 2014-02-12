<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'CrowdSourcing',
    'theme'=>'crowdsourcing',
    'language'=>'es',


	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'ext.yii-mail.YiiMailMessage',
	),



	
	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

	),
	

	// application components
	'components'=>array(

        'myhelper'=>array(
            'class'=>'application.components.MyHelper',
        ),

        'globals'=>array(
            'class'=>'application.components.MyGlobals'
        ),


        'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'transportType' => 'smtp',  //smtp
            'transportOptions' => array(
                'host' => 'suisseworks.com', // example for gmail: 'smtp.gmail.com' or smtpout.secureserver.net with godaddy
                'encryption' => 'ssl',// if needed or else just erase this line
// like for godaddy hosting (because not supported)
                'username' => 'admin@websensemble.com',
                'password' => 'uWjWl65ZUkz',
                'port' => 465, //465, //use 80 with godaddy hosting
            ),
            'viewPath' => 'application.views.mails', // that will be the path to your email template
// here it is located in '/protected/views/mails/' directory
        ),




        /*
        'clientScript' => array(
            'scriptMap' => array(
                'jquery.js' => true,
                'jquery.min.js' => true,
            ),
        ),
        */



		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format

    		'urlManager'=>array(
            'showScriptName'=>false,
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

       /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
       */
		// uncomment the following to use a MySQL database




		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=crowdsourcing',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
            'tablePrefix' => 'cs_',
		),


        /*
         * DB INFO POR PRODUCTION
         */

/*

        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=crowdsourcing',
            'emulatePrepare' => true,
            'username' => 'crowdsourcing',
            'password' => 'QEm2qSqtdFWtLCQF',
            'charset' => 'utf8',
            'tablePrefix' => 'cs_',
        ),

*/


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
		// this is used in contact page
		'adminEmail'=>'matthiasmalek72@gmail.com',
        'networkingDaysEmail' => 'admin@websensemble.com'
	),
);

?>