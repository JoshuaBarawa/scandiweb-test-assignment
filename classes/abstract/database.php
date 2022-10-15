<?php 
	
	abstract class database {
		// private $host = "localhost";
		// private $db_name = "techroll_ecommerce";
		// private $username = "techroll_ecommerce";
		// private $password = "zSkBoM#63x-5";
		// public $conn;

		private $host = "localhost";
		private $username = "root";
		private $db_name = "test_assignment";
		private $password = "tryagain";
		public $conn;

		public function getConnection(){
  
			$this->conn = null;
	  
			try{
				$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
				$this->conn->exec("set names utf8");
			}catch(PDOException $exception){
				echo "Connection error: " . $exception->getMessage();
			}
	  
			return $this->conn;
		}
	}
 ?>