<?php
class Controller_Offers extends Controller{
    function __construct(){
        $this->model = new Model_Offers();
        $this->view = new View();
    }

    function action_index(){


        if(!$this->check_user()){
            header("Location: /login");
        } else {
            $this->view->generate("vacancies_list_view.php", "template_view.php", null);
        }
        
    }


}