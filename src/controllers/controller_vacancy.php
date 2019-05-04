<?php
class Controller_Vacancy extends Controller{
    function __construct(){
        $this->model = new Model_Vacancy();
        $this->view = new View();
    }

    function action_index(){
        if(!$this->check_user()){
            header("Location: /login");
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

}