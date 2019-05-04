<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
	}
	
	// действие (action), вызываемое по умолчанию
	function action_index()
	{
		// todo	
	}

	public function check_user(){
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 

		if(!empty($_SESSION) && $_SESSION["authorized"] && isset($_SESSION["user"])){
			return true;
		} else {
			return false;
		}
	}
}
