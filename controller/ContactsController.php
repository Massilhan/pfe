<?php

class ContactsController extends Controller{

	function index(){
		$this->loadModel('Contacts');
		$this->render('Contacts');
	}

}
?>