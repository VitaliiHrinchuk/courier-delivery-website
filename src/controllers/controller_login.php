<?php

class Controller_Login extends Controller{

    function action_index(){
        if(isset($_POST["email"]) && isset($_POST["password"])){
            if($_POST["email"] == "admin@admin.com" && $_POST["password"] == "admin"){
                $data["login_status"] = true;
            } else {
                $data["login_status"] = false;
                $data["login_msg"] = "Wrong data";
            }
        } else {
            $data["login_status"] = false;
            $data["login_msg"] = "Miss data";
        }
        if($data["login_status"] == true){
            $this->view->generate('user_view.php', 'template_view.php', $data);
        } else {
            $this->view->generate('login_view.php', 'template_view.php', $data);
        }
        
    }
    function action_registration(){
        $this->view->generate('registration_view.php', 'template_view.php', null);
    }
}