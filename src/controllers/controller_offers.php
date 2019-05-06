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
            $tags = $this->model->get_tags();
            if(empty($_GET)){
                $pagination["offset"] = 5;

                $data = $this->model->get_offer_data(null, $pagination);
                $data["current_offset"] = 0;
                $data["tags"] = $tags;
                $this->view->generate("vacancies_list_view.php", "template_view.php", $data);
            } else {
                $offset = isset($_GET["offset"]) ? $_GET["offset"] : 0 ;
                $pagination["offset"] = $offset;
                
                

                $options["search"] = isset($_GET["search"]) ? $_GET["search"] : null ;
                $options["city"] = isset($_GET["city"]) ? $_GET["city"] : null ;
                $options["transport"] = isset($_GET["transport"]) ? $_GET["transport"] : null ;
                $options["tags"] = isset($_GET["tag"]) ? $_GET["tag"] : null ;
                $data = $this->model->get_offer_data($options, $pagination);
                $data["current_offset"] = $offset;
                $data["tags"] = $tags;

                $this->view->generate("vacancies_list_view.php", "template_view.php", $data);
            }
            
        }
        
    }


}