<?php 

	class Database 
	{

		private $dbhost = "localhost";
		private $dbuser = "root";
		private $dbpass = "";
		private $dbname = "p_lr";
		public $pdo;

	   
	    public function __construct()
	    {
	        if (!isset($this->pdo)) {
	        	try {
	        		$link = new PDO("mysql:host=".$this->dbhost."; dbname=".$this->dbname, $this->dbuser, $this->dbpass);
	        		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        		$link->exec("set CHARACTER SET utf8");
	        		$this->pdo = $link;


	        	} catch (PDOException $e) {
	        		die("Failed to connect database".$e->getMessage());
	        	}
	        }
	    }
	}

?>