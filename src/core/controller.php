<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
		$this->model = new Model();
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
			$_SESSION["unread_msg"] = $this->model->get_unread_msg();
			return true;
		} else {
			return false;
		}
	}
}
