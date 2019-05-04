<?php

class Model_Login extends Model {
    public $db;
    public  function get_data(){
        $db = $this->db;

        $sql = mysqli_query($db, "SELECT * FROM users");

        return $sql;
    }

    public function add_user($user_data){
        $db = $this->db;
        $email = htmlentities(mysqli_real_escape_string($db, $user_data["email"]));
        $name = htmlentities(mysqli_real_escape_string($db, $user_data["name"]));
        $password = htmlentities(mysqli_real_escape_string($db, $user_data["password"]));
        $age = htmlentities(mysqli_real_escape_string($db, $user_data["age"]));
        $city = htmlentities(mysqli_real_escape_string($db, $user_data["city"]));

        $query = "INSERT INTO users VALUES(NULL, '$email', '$password', '$name', '$age', NULL, NULL, '$city')";

        $result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 

        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function check_email_exist($email){
        $db = $this->db;

        $email = htmlentities(mysqli_real_escape_string($db, $email));

        $query = "SELECT email FROM users WHERE email = '$email' ";

        $result =  mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 

        if(mysqli_num_rows($result) >= 1){
            return false;
        } else {
            return true;
        }
    }

    public function login_user($user_data){
        $db = $this->db;

        $email = htmlentities(mysqli_real_escape_string($db, $user_data["email"]));
        $password = htmlentities(mysqli_real_escape_string($db, $user_data["password"]));

        $query = "SELECT id, email, pass_hash FROM users WHERE email = '$email'";
        $result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 

        if(mysqli_num_rows($result) < 1){
            return false;
        } else {
            $row = $result->fetch_assoc();
            if(password_verify($user_data["password"], $row["pass_hash"])){
                return $row;
            } else {
                return false;
            }
        }
    }
}