<?php

//加载必备的类文件
require_once FRAMEWORK_PATH."common.php";
require_once APPLICATION_PATH."common.php";

require_once FRAMEWORK_PATH."core/Config.php";
require_once FRAMEWORK_PATH."core/Request.php";
require_once FRAMEWORK_PATH."core/Input.php";
require_once FRAMEWORK_PATH."core/Url.php";
require_once FRAMEWORK_PATH.'core/Dispatcher.php';
require_once FRAMEWORK_PATH."core/Mysql.php";
require_once FRAMEWORK_PATH."core/Model.php";
require_once FRAMEWORK_PATH."core/View.php";
require_once FRAMEWORK_PATH."core/Controller.php";

require_once FRAMEWORK_PATH."core/Validate.php";


//路由开始
$D =new Dispatcher();
$D->dispatch();
