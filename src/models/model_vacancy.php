<?php

class Model_Vacancy extends Model {
    public $db;
    public  function get_data(){
       
    }

    public function get_tags(){
        $db = $this->db;


        $query = "SELECT * FROM tags";

        $result =  mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
        
        $tags = array();

        while($row = mysqli_fetch_assoc($result)) {
            array_push($tags,$row);
         };
        
         
         return $tags;
    }

    public function add_vacancy($data){
        $db = $this->db;

        $name = htmlentities(mysqli_real_escape_string($db, $data["name"]));
        $text = htmlentities(mysqli_real_escape_string($db, $data["text"]));
        $author_id = htmlentities(mysqli_real_escape_string($db, $_SESSION["user_id"]));

        $query = "INSERT INTO offer (id, name, text, author_id, status) VALUES(NULL, '$name', '$text', '$author_id', 1)";

        $vacancy_result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 

        $insert_id = mysqli_insert_id($db);

        $tags_query = "INSERT INTO offer_tags (id, offer_id, tag_id) VALUES ";
        
        foreach ($data["tags"] as $key => $value) {
            $tag = htmlentities(mysqli_real_escape_string($db, $value));
            $query_part = "(NULL, ".$insert_id.", ".$tag."), ";
            $tags_query .= $query_part;
        }

        $tags_result = mysqli_query($db, substr($tags_query, 0, -2)) or die("Ошибка " . mysqli_error($db)); 

        if($vacancy_result && $tags_result){
            return true;
        } else {
            return false;
        }
    }

}