<?php
class Request{

	public $url;

	function __construct(){

		$this->url=$_SERVER['REQUEST_URI'];
		$this->url=substr($this->url,1);
	}
	
}
?>