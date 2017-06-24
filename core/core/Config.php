<?php
class Config{
	public static $config;
	
	//获取配置
	public static function get($key = null){
		if(!isset(self::$config)){
			self::$config = self::setConfig();
		}
		if($key==null){
			return self::$config;
		}
		return self::$config[$key];
	}
	
	//设置配置
	public static function set($key,$value){
		if(!isset(self::$config)){
			self::$config = self::setConfig();
		}
		self::$config[$key] = $value;
		return self::$config;
	}
	
	//加载并合并配置文件
	/*惯例重于配置是系统遵循的一个重要思想，框架内置有一个惯例配置文件，
	* 按照大多数的使用对常用参数进行了默认配置。所以，对于应用的配置文
	* 件， 往往只需要配置和惯例配置不同的或者新增的配置参数，如果你完
	* 全采用默认配置，甚至可以不需要定义任何配置文件。
	*/
	public static function setConfig(){
		$config 	= require FRAMEWORK_PATH.'config.php';	// 加载框架配置文件

		foreach ($config['extra_config_list'] as $config_file) {// 加载应用配置文件
			$config_file 	= include APPLICATION_PATH.$config_file.'.php';
			$config_temp 	= is_array($config_file) ? $config_file : array();
			$config = array_merge($config, $config_temp);
		}
		// p($config );die();
		foreach ($config['extra_config_list'] as $config_file) {// 加载模块配置文件
			$config_file 	= @include APPLICATION_PATH.MODULE_NAME.$config_file.'.php';
			$config_temp 	= is_array($config_file) ? $config_file : array();
			$config = array_merge($config, $config_temp);
		}

		return $config;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}