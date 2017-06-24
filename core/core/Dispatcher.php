<?php
class Dispatcher {

	//检查路径参数，获取模块，控制器和方法名
	public function dispatch(){

		if(isset( $_SERVER['PATH_INFO'] )){
			//获取pathinfo地址
			$path = $_SERVER['PATH_INFO'];
			$path = explode('/', $path);
			$path = array_merge(array_filter($path));
			
			$module 	= isset($path[0]) ? $path[0] : Config::get('default_module');
			$controller = isset($path[1]) ? $path[1] : Config::get('default_controller');
			$action 	= isset($path[2]) ? $path[2] : Config::get('default_action');
		}else{
			//获取原始地址
			$module 	= isset($_GET['m']) ? $_GET['m'] : Config::get('default_module');
			$controller = isset($_GET['c']) ? $_GET['c'] : Config::get('default_controller');
			$action 	= isset($_GET['a']) ? $_GET['a'] : Config::get('default_action');
		}

		define('MODULE_NAME',$module);
		define('CONTROLLER_NAME',$controller);
		define('ACTION_NAME', $action);

		$this->instantiate();		
	}
	
	
	//实例化控制器
	public function instantiate(){
		$file = APPLICATION_PATH.MODULE_NAME."/controller/".CONTROLLER_NAME.".php";
		if(!is_file($file)){
			View::jump("Dispatcher:找不到文件！<br/>$file"); 
			exit();
		}
		require $file;

		//实例化控制器
		$class = CONTROLLER_NAME;
		if (class_exists($class)){
			$ctrl = new $class();
		}else{
			View::jump("Dispatcher:找不到".$class."类定义！<br/>文件位置：$file"); 
			exit();
		}
		
		//执行方法
		$action = ACTION_NAME;
		if(method_exists($ctrl,$action)){
			$ctrl->$action();
		}else{
			View::jump("Dispatcher:".$class."找不到".$action."方法！<br/>文件位置：$file"); 
			exit();
		}
		
	}
	


}