<?php 
class baseDeDatos extends PDO
{ 
	private $dbname = "notas3";
	private $host = "localhost";
        //private $host = "52.5.161.138";
	private $user = "postgres";
	private $pass = "puma1630";
	private $port = 5432;
	private $db;
 
	public function __construct() 
	{
	    try {
 	        $this->db = parent::__construct("pgsql:host=$this->host;port=$this->port;dbname=$this->dbname;user=$this->user;password=$this->pass");
 	    } 
            catch(PDOException $e) {
                    echo  $e->getMessage();
 	    } 
 	}
        
        public function __destruct() 
	{
	    $this->db = null; 
 	}

}