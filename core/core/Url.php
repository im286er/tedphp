<?php
class Url{
	//获取web应用的根路径(base URL)
	public static function base(){
		
	}
	
	public static function to($info,$arr=NULL){
		//根目录
		if(dirname($_SERVER['SCRIPT_NAME']) == '\\'){ //程序在根目录
			$url = '/';
		}else{ //程序在子目录
			$url = dirname($_SERVER['SCRIPT_NAME']).'/';
		}
		
		//路径
		$info = strtolower($info);
		if(isset($_SERVER['REDIRECT_URL'])){//pathinfo rewrite模式
			$url = $url.$info;
		}elseif(isset($_SERVER['PATH_INFO']) || Config::get('url_model')==2){//pathinfo 模式
			$url = $_SERVER['SCRIPT_NAME'].'/'.$info;			
		}else{//普通模式
			$url_arr = explode('/',$info);
			$url = $_SERVER['SCRIPT_NAME']."?m=".$url_arr['0'].'&c='.$url_arr['1'].'&a='.$url_arr['2'];
		}

		//get参数
		if(is_array($arr) && sizeof($arr)>0){
			$url_end = http_build_query($arr);
			$url = $url.'?'.$url_end;
		}
		
		return $url;
	}
	
	
	
	
}