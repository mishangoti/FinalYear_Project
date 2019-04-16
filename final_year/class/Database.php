<?php


	/**  Database connection 
	 *   functions:  sanitize, Auth, Insert, Update, Delete, Select
	 */  

	class Database extends Exception
	{
		private $connection;
		private $host = "localhost";
		private $username = "root";
		private $password = "";
		private $db_name = "final_year";
 
 		// Database connection
		public function Connect_db(){
			try{

				$this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
				// if(mysqli_connect_error()){
				// 	die("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_errno());
				// }	
				return $this->connection;
			}catch (Exception $Exception_Connect_db){
				return $Exception_Connect_db;
			}
		}
	}
?>
