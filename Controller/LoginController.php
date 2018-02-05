<?php
Class LoginController extends Controller{

	function index(){

		$this->loadModel('Login');
		 

		$this->render('Login');
		
	}

	function error(){
		$this->render('noconnect');
	}
	

	
	
}