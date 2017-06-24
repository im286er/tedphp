<?php
class Controller{
	private $view;
	
	public function __construct(){
		$this->view = new View();
	}

	//模板中赋值
    protected function assign($var, $value) {
        View::assign($var,$value);
    }
	
	//输出模板
	public function display($template = ''){
		return $this->view->display($template);
	}
	

	//提示信息与跳转地址
	public function success($message, $url=NULL, $error="success"){
		return View::jump($message, $url);
	}
	

	//提示信息与跳转地址
	public function error($message, $url=NULL, $error="error"){
		return View::jump($message, $url, $error);
	}
	

	
	
	
	
	
	
	
	
}