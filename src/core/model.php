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
}