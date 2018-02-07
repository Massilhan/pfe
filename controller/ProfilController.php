<?php

class ProfilController extends Controller{

	function index(){
		$this->loadModel('Profil');
		$this->render('Profil');
	}
}
?>