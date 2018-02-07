<?php

class ConseilsController extends Controller{

	function index(){
		$this->loadModel('conseils');
		$this->render('conseils');
	}
}
?>