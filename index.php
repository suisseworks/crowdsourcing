
<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

//
setlocale(LC_TIME, 'es'); //  desplegar cosas en español..por ejemplo
// strftime('%B', mktime(12, 0, 0, 1, 1, 2005)) => enero

// change the following paths if necessary
$yii=dirname(__FILE__).'/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);



require_once($yii);
Yii::createWebApplication($config)->run();
