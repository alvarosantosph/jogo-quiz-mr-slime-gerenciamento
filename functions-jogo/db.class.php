<?php
	//Classe de conexão com o banco de dados
	class Db extends PDO{
		
		private $host 		= 'us-cdbr-iron-east-03.cleardb.net';
		private $user		= 'bbb445256f55fb';
		private $password	= '4738407b';
		private $dbname 	= 'heroku_d1daacf8ba8fe82';


		private $type		= 'mysql';
		private $port		= 3306;

		protected $conn;
		
	
		
		function query($sql){
			$r = parent::query($sql);
			$r->setFetchMode(PDO::FETCH_OBJ);
			return $r;
		}

		public function __construct(){
		        try{
		           	$this->conn = parent::__construct($this->type.":host=".$this->host.";port=".$this->port.";dbname=".$this->dbname, $this->user, $this->password);
		        } catch(PDOException $e){
		            die("Connection failed. Try again");
		        }
		}
		    
		public function getConn(){
		        return $this->conn;
		}
		    
		/**
		* Fecha a conexao com o DB
		**/
		public function __destruct(){
		        $this->conn = null;
		}
		
		
	}


?>
