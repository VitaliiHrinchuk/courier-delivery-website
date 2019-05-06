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
            if(empty($_GET)){
                $pagination["offset"] = 5;

                $data = $this->model->get_offer_data(null, $pagination);
                $data["current_offset"] = 0;
                $this->view->generate("vacancies_list_view.php", "template_view.php", $data);
            } else if(isset($_GET["offset"])){
                $pagination["offset"] = $_GET["offset"];
                
                $data = $this->model->get_offer_data(null, $pagination);
                $data["current_offset"] = $_GET["offset"];
                $this->view->generate("vacancies_list_view.php", "template_view.php", $data);

            }
            
        }
        
    }


}