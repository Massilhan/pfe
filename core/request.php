<?php
class Request{

	public $url;

	function __construct(){
		$this->url=$_SERVER['REQUEST_URI'];
		$this->url=str_replace(BASE_URL,"",$this->url);
	}
	
}
?>