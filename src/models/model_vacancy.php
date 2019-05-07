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
        $avg_price = htmlentities(mysqli_real_escape_string($db, $data["avg_price"]));
        $author_id = htmlentities(mysqli_real_escape_string($db, $_SESSION["user_id"]));

        $query = "INSERT INTO offer (id, name, text, author_id, active_status, avg_price) VALUES(NULL, '$name', '$text', '$author_id', 1, '$avg_price')";

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

    public function get_vacancy($id){
        $db = $this->db;

        $id = htmlentities(mysqli_real_escape_string($db, $id));

        $query = "SELECT * FROM offer WHERE id = '$id' ";

		$result =  mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		
		if (mysqli_num_rows($result) > 0) {

            $row = $result->fetch_assoc();


            $author_id = mysqli_real_escape_string($db, $row["author_id"]);
            $query_user = "SELECT id, name, age, hasTransport, city FROM users WHERE id = '$author_id' ";
            $user_result = mysqli_query($db, $query_user) or die("Ошибка " . mysqli_error($db));
            $row["author"] = mysqli_fetch_assoc($user_result);


            $comments_query = "SELECT users.id, users.name, comments.publish_date, comments.text FROM users LEFT JOIN comments ON users.id = comments.author_id  WHERE comments.offer_id = '$id' ORDER BY comments.publish_date";

            $comments_result = mysqli_query($db, $comments_query) or die("Ошибка " . mysqli_error($db));
            $row["comments"] = array();
            while($comments_row = $comments_result->fetch_assoc()){
                array_push($row["comments"], $comments_row);
            }

            $query_tags = "SELECT tags.name FROM tags LEFT JOIN offer_tags ON tags.id = offer_tags.tag_id WHERE offer_tags.offer_id = '$id'";
            $tags_result = mysqli_query($db, $query_tags) or die("Ошибка " . mysqli_error($db));
            $row["tags"] = array();
            while($tags_row = $tags_result->fetch_assoc()){
                array_push($row["tags"], $tags_row);
            }

			return $row;
         } else {
            return false;
         }
    }

    public function add_comment($comment){
        $db = $this->db;

        $author_id = mysqli_real_escape_string($db, $_SESSION["user_id"]);
        $offer_id = mysqli_real_escape_string($db, $comment["offer_id"]);
        $text = mysqli_real_escape_string($db, $comment["text"]);

        $query = "INSERT INTO comments VALUES (NULL, '$offer_id', '$author_id', '$text', NULL) ";
        $result =  mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));

        if($result){
            return true;
        } else {
            return false;
        }
    }
    public function send_offer($message){
        $db = $this->db;

        $customer_id = mysqli_real_escape_string($db, $_SESSION["user_id"]);
        $offer_id = mysqli_real_escape_string($db, $message["offer_id"]);
        $text = mysqli_real_escape_string($db, $message["message"]);
        $user_id = mysqli_real_escape_string($db, $message["author_id"]);

        $query = "INSERT INTO offering_message VALUES (NULL, '$offer_id', '$customer_id', '$user_id', '$text', NULL) ";
        $result =  mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));

        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function set_vacancy_viewed($id){
        $db = $this->db;

        $id = mysqli_real_escape_string($db, $id);

        $query = "UPDATE offer  SET views = views + 1 WHERE id = '$id'";

        $result =  mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
    }
}