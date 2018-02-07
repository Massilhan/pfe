<?php
Class LoginController extends Controller{

	function index(){

		$this->loadModel('login');
		 

		$this->render('login');
		
	}

	function error(){
		$this->render('noconnect');
	}
	

	
	
}