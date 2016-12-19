<?php
session_start();
define('ROOT',dirname(__FILE__));
define('INCLUDES',ROOT.'/includes');
define('PLUGINS',INCLUDES.'/plugins');
define('CONTROLLERS',INCLUDES.'/controllers');
define('MODELS',INCLUDES.'/models');
define('VIEWS',ROOT.'/templates');
define('ASSETS',ROOT.'/assets');


require(INCLUDES.'/config.php');
require(INCLUDES.'/general.functions.php');
require(INCLUDES.'/Redirect.php');
require(CONTROLLERS.'/controller.php');
require(MODELS.'/model.php');
require(INCLUDES.'/system.php');
require(INCLUDES.'/mysql.php');

system::Set('db',new mysqlDB());
