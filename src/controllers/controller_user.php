<?php

class Controller_User extends Controller{
    function __construct(){
        $this->model = new Model_User();
        $this->view = new View();
    }

    function action_index(){
        session_start();
        if(empty($_GET)){
            $user_data = $this->model->get_current_user_data();
            $user_data["is_current"] = true;
            $this->view->generate('user_view.php', 'template_view.php', $user_data );
        } else {
            
            if($this->check_user()){
                    $user_data = $this->model->get_user_data($_GET["id"]);
                    if($user_data  != false){
                        if($user_data["email"] === $_SESSION["user"]){
                            $user_data["is_current"] = true;
                        } else {
                            $user_data["is_current"] = false;
                        }
                        $this->view->generate('user_view.php', 'template_view.php', $user_data );
                    } else {
                        Route::ErrorPage404();
                    }
            } else {
                Route::ErrorPage404();
            }
        }
        
        
    }

    function action_edit(){
        if($this->check_user()){
            if(empty($_POST)) {
                $user_data = $this->model->get_current_user_data();
                $this->view->generate('user_edit_view.php', 'template_view.php', $user_data );
            } else {
                $user_data = $this->model->get_current_user_data();
                if($this->model->edit_profile($_POST)){
                    header("Location: /user");
                } else {

                }
            }
            
        } else {
            header("Location: /login");
        }
        
    }

    function action_logout(){
        session_start();
		session_destroy();
		header('Location:/');
    }
}