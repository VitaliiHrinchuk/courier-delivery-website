<?php

class Controller_Login extends Controller{

    function __construct(){
        $this->model = new Model_Login();
        $this->view = new View();
    }
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
        if(empty($_POST)){
           
            $this->view->generate('registration_view.php', 'template_view.php', null);

        } else {
            if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["city"])){
                // $data["registered"] = true;

                if(!$this->model->check_email_exist($_POST["email"])){
                    $data["registered"] = false;
                    $data["msg"] = "Ця електронна адреса вже існує";
                    $this->view->generate('registration_view.php', 'template_view.php', $data);
                } else {
                    $pass_hash = password_hash($_POST["password"],PASSWORD_BCRYPT);
                    $user_data = array("email"=>$_POST["email"],
                                       "password"=>$pass_hash, 
                                       "name"=>$_POST["name"],
                                       "age"=>$_POST["age"],
                                       "city"=>$_POST["city"]);
    
                    
                    $result = $this->model->add_user($user_data);
                    if($result){
                        header("Location: /user");
                    } else {
                        $this->view->generate('registration_view.php', 'template_view.php', $result);
                    }
                }

               
                // $this->view->generate('registration_view.php', 'template_view.php', $data);
                
            } else {
                $data["registered"] = false;
                $data["msg"] = "Всі поля повинні бути заповнені!";
                $this->view->generate('registration_view.php', 'template_view.php', $data);
            }
        }
        
        // $this->view->generate('registration_view.php', 'template_view.php', null);
    }

    function action_createuser(){
        
    }
}