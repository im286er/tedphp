<?php
if(version_compare(PHP_VERSION,'5.2.17','<'))  die('require PHP > 5.2.17 !');
date_default_timezone_set("PRC");

//设置显示错误报告,即使服务器禁止显示
ini_set('display_errors','On');
error_reporting(E_ALL);

//框架设置
define('APPLICATION_DEBUG',True);
define('APPLICATION_PATH','./application/');
define('FRAMEWORK_PATH','./core/');

require './core/core.php';


