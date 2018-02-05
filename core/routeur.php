<?php

class Router{

	

	/**
	* Permet de parser une url
	*@param $url URL à parser
	*@return tableau contenant les paramètres
	**/
	static function parse($url,$request){
		
		$url=trim($url,'/');
		
		$params=explode('/',$url);
		if(empty($url)){
			$params[0]='login';
			$request -> controller= $params[0];
			$request -> action=isset($params[1]) ? $params[1]:'index';
		
			$request->params= array_slice($params,2);
			
	
		}else{
			$request -> controller=$params[0];
			$request -> action=isset($params[1]) ? $params[1]:'index';
		
			$request->params= array_slice($params,2);
			
		}
		
		

		return true;

	}


}