<?php
	class Database{
		private $host = "127.0.0.1:3306";
		private $db_name = "allarmsystem";
		private $user = "root";
		private $password = "";
		public $conn;
		
		function __construct(){
			$this->conn = null;
			$this->conn = @new mysqli($this->host, $this->user, $this->password, $this->db_name);
			if($this->conn->connect_errno){
				die("errore connessione DB");
			}
			//return $this->conn;
		}
		public function getConnection(){
			return $this->conn;
		}
		
		
		function closeDB(){
			$this->conn->close();
		}
		
	}

?>