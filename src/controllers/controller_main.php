<?php

class Controller_Main extends Controller{
    function __construct(){
        $this->model = new Model();
        $this->view = new View();
    }

    function action_index(){
        if($this->check_user()){
            header("Location: /offers");
        } else {
            $this->view->generate('main_view.php', 'template_view.php', null);
        }
        
    }
}