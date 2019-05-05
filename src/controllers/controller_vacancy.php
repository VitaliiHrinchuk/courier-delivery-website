<?php
class Controller_Vacancy extends Controller{
    function __construct(){
        $this->model = new Model_Vacancy();
        $this->view = new View();
    }

    function action_index(){


        if(!$this->check_user()){
            header("Location: /login");
        } else {
            
            if(!empty($_GET) && isset($_GET["id"])){


                $vacancy = $this->model->get_vacancy($_GET["id"]);
                if($vacancy !== false){
                    $this->view->generate("vacancy_view.php", "template_view.php", $vacancy);
                } else {
                    Route::ErrorPage404();
                }
                
            }
        }
        
    }

    function action_add(){
        
        if($this->check_user()){
            if(empty($_POST)){
                $data["tags"] = $this->model->get_tags();
                $this->view->generate("add_vacancy_view.php", "template_view.php", $data);
            } else {
                if(isset($_POST['vacancy_name']) && isset($_POST['vacancy_desc']) && isset($_POST['tags'])){
                    $vacancy_data["name"] = $_POST['vacancy_name'];
                    $vacancy_data["text"] = $_POST['vacancy_desc'];
                    $vacancy_data["tags"] = $_POST['tags'];
                    $this->model->add_vacancy($vacancy_data);
                    header("Location: /user");
                } else{
                    $this->view->generate("add_vacancy_view.php", "template_view.php", null);
                }
            }

        } else {
            header("Location: /login");
        }
        
    }

    function action_comment(){
        if($this->check_user()){
            if(!empty($_POST) && isset($_POST["comment"]) && isset($_POST["offer_id"])){
    
                $comment_data["offer_id"] = $_POST["offer_id"];
                $comment_data["text"] = $_POST["comment"];
                if($this->model->add_comment($comment_data)){
                    header("Location: /vacancy?id=".$_POST["offer_id"]);
                } else {
                    header("Location: /");
                }
            } else {
                header("Location: /vacancy?id=".$_POST["offer_id"]);
            }

        } else {
            header("Location: /login");
        }
    }

    function action_offering(){
        if($this->check_user()){
            if(!empty($_POST) && isset($_POST["message"]) && isset($_POST["offer_id"]) && isset($_POST["author_id"])){
    
                $message_data["offer_id"] = $_POST["offer_id"];
                $message_data["message"] = $_POST["message"];
                $message_data["author_id"] = $_POST["author_id"];
                if($this->model->send_offer($message_data)){
                    header("Location: /vacancy?id=".$_POST["offer_id"]);
                } else {
                   header("Location: /");
                }
            } else {
                header("Location: /vacancy?id=".$_POST["offer_id"]);
            }

        } else {
            header("Location: /login");
        }
    }

}