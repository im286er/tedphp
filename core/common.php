<?php

//输出变量 带有<pre>标签 第二个参数是否终止，第三个参数是否显示h1
function p($var,$is_die=false,$is_big=false){
	header("Content-type: text/html; charset=utf-8");
	if($is_big){
		echo "<h1>";
		echo $var;
	}else{
		echo "<pre>";
		print_r($var);
	}
	$is_die && die();
}

function view(){
	$view = new View();
	return $view->display();
}

function url($info,$arr=NULL){
	return Url::to($info,$arr);
}



