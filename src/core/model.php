<?php


class Model
{
	public $db;
	/*
		Модель обычно включает методы выборки данных, это могут быть:
			> методы нативных библиотек pgsql или mysql;
			> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
			> методы ORM;
			> методы для работы с NoSQL;
			> и др.
	*/
	function __construct(){
		$this->db = mysqli_connect("127.0.0.1","root","","delivery");
		$this->db->set_charset("utf8");
	}
	// метод выборки данных
	public function get_data()
	{
		// todo

	}
	public function get_unread_msg(){
		$db = $this->db;

		$user_id = $_SESSION['user_id'];
		$query_messages = "SELECT COUNT(*) FROM offering_message WHERE user_id = '$user_id' AND viewed = 0";
		$message_result = mysqli_query($db, $query_messages) or die("Ошибка " . mysqli_error($db));

		$row = mysqli_fetch_assoc($message_result);

		return $row["COUNT(*)"];

	}
}