<?php
 class Model_User extends Model{

    public function get_data()
	{	
		
	}

	public function check_user($user_email){
		$db = $this->db;

        $email = htmlentities(mysqli_real_escape_string($db, $user_email));

        $query = "SELECT email FROM users WHERE email = '$email' ";

        $result =  mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 

        if(mysqli_num_rows($result) < 1){
            return false;
        } else {
            return true;
        }
	}

	public function get_user_data($id){
		$db = $this->db;

        $id = htmlentities(mysqli_real_escape_string($db, $id));

        $query = "SELECT name, age, city, email, hasTransport, about FROM users WHERE id = '$id' ";

		$result =  mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		
		if (mysqli_num_rows($result) > 0) {


			$query_offer = "SELECT * FROM offer WHERE author_id = '$id' ";

			$offers_result = mysqli_query($db, $query_offer) or die("Ошибка " . mysqli_error($db));
			

			$row = $result->fetch_assoc();
			
			$row["offers"] = array();
			while($offers_row = mysqli_fetch_assoc($offers_result)) {
				array_push($row["offers"],$offers_row);
			 };


			return $row;
         } else {
            return false;
         }
	}

	public function get_current_user_data(){
		$db = $this->db;

        $email = htmlentities(mysqli_real_escape_string($db, $_SESSION["user"]));

        $query = "SELECT id,name, age, city, email, hasTransport, about FROM users WHERE email = '$email' ";

		$result =  mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		
		if (mysqli_num_rows($result) > 0) {


			
			$row = $result->fetch_assoc();

			$user_id = mysqli_real_escape_string($db, $row["id"]);

			$query_offer = "SELECT * FROM offer WHERE author_id = '$user_id' ";

			$offers_result = mysqli_query($db, $query_offer) or die("Ошибка " . mysqli_error($db));
			

			
			
			$row["offers"] = array();
			while($offers_row = mysqli_fetch_assoc($offers_result)) {
				array_push($row["offers"],$offers_row);
			 };


			//  $query_messages = "SELECT offering_message.id ,offer.name AS offer, users.name AS user, offering_message.text, offering_message.creation_date FROM offering_message LEFT JOIN offer ON offering_message.offer_id = offer.id LEFT JOIN users ON offering_message.customer_id = users.id WHERE offering_message.user_id = '$user_id'";
			//  $message_result = mysqli_query($db, $query_messages) or die("Ошибка " . mysqli_error($db));

			//  $row["messages"] = array();
			//  while($message_row = mysqli_fetch_assoc($message_result)) {
			// 	array_push($row["messages"],$message_row);
			//  };

			return $row;
         } else {
            return false;
         }
	}

	public function edit_profile($user_data){
		$db = $this->db;

		$email = htmlentities(mysqli_real_escape_string($db, $_SESSION["user"]));
        $name = htmlentities(mysqli_real_escape_string($db, $user_data["name"]));
        $age = htmlentities(mysqli_real_escape_string($db, $user_data["age"]));
		$city = htmlentities(mysqli_real_escape_string($db, $user_data["city"]));
		$about = htmlentities(mysqli_real_escape_string($db, $user_data["about"]));
		$has_transport = htmlentities(mysqli_real_escape_string($db, $user_data["hasTransport"]));

        $query = "UPDATE users SET name = '$name', age = '$age', city = '$city', about = '$about', hasTransport = '$has_transport' WHERE email='$email'";

        $result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 

        if($result){
            return true;
        } else {
            return false;
        }
	}


	public function get_messages(){
		$db = $this->db;
		$user_id = $_SESSION['user_id'];
		$query_messages = "SELECT offering_message.id ,offer.name AS offer, users.name AS user, offering_message.text, offering_message.creation_date FROM offering_message LEFT JOIN offer ON offering_message.offer_id = offer.id LEFT JOIN users ON offering_message.customer_id = users.id WHERE offering_message.user_id = '$user_id'";
		$message_result = mysqli_query($db, $query_messages) or die("Ошибка " . mysqli_error($db));

		$row["messages"] = array();
		while($message_row = mysqli_fetch_assoc($message_result)) {
		   array_push($row["messages"],$message_row);
		};

		$change_status_query = "UPDATE offering_message SET viewed = 1 WHERE user_id = '$user_id'";
		$change_status_result = mysqli_query($db, $change_status_query) or die("Ошибка " . mysqli_error($db));
		return $row;
	}
 }