<?php
ini_set('display_errors', 0);
require_once "db.class.php"; //Classe de conexao com o banco de dados

class Game extends Db {
	protected $array;
	protected $tabela;
	protected $primaryKey;
	protected $primaryKeyUpdate;
	private $debugMode;
	private $post;
	private $pdoObject;
	public $queryStr;
	protected $view;
	protected $getDadosFromView;
	
	
	/**
	 * Classe PolarGames utilizando a PDO (objeto de conexao com o banco de dados)
	 *  Esta classe deve ser extendida por subclasses e o minimo que uma subclasse
	 *  deve possuir é o método construtor __construct() e indicar a tabela do BD,
	 *  caso exista.
	 */
	function __construct($tabela="", $view=""){
		parent::__construct();
		$this->debugMode = false;
		$this->array = array();
		$this->primaryKey = "id";
		$this->primaryKeyUpdate = "id_player";
		$this->tabela = $tabela;
		$this->view = $view;
		$this->getDadosFromView = false;
		return $this;
	}
	
	/**
	 * Inicializa / Finaliza o modo de debug
	 * @param boolean $debug
	 * 
	 */
	public function debug($debug=true){
		$this->debugMode = $debug;
	}
	
	
	/**
	 * Adiciona na tabela especificada 
	 *
	 * @param Mixed $array
	 * @return boolean
	 */
	public function add(){
		$this->prepare();
		$qr = "INSERT INTO $this->tabela(";
		$tam = sizeof($this->array);
		$penultimo = $tam-1;
		
		$i=0;
		foreach ($this->array as $c=>$v){
			if(is_array($v)){
				foreach ($v as $e=>$z) {
						$qr .= "`$e`".", ";
						$i++;
				}
			}else{
				if($c != "" && $v != ""){
					$qr .= "`$c`".", ";
					
					$i++;
				}
			}	
		}
		
		$qr .= ") VALUES(";
		//Remove a ultima virula
		$qr = str_replace(", )", ")", $qr);
		
		
		$i=0;
		foreach ($this->array as $c=>$v){
			if(is_array($v)){
				foreach ($v as $e=>$x) {
						if(trim($x) != "")
							$qr .= "'$x'".", ";
						else
							$qr .= "NULL, ";
						$i++;
				}
			} else{
				if($c != "" && trim($v) != ""){
					$qr .= "'$v',";					
					$i++;
				} elseif($c != "" && trim($v) == ""){
					$qr .= 'NULL, ';
				}
			}
		}
		$qr .= ")";
		
		//Remove a ultima virula
		$qr = str_replace(", )", ")", $qr);
		$this->queryStr = $qr;
		if(!$this->debugMode)
			return $this->exec($qr);
		else{
			die("QS: ".$this->queryStr);
		}
	}
	
	/**
	 * Altera o cadastro do determinado elemento na tabela
	 *
	 * @param Int $id
	 * @return Bool
	 */
	public function update($id){
		$this->prepareUpdate();
		$qr = "UPDATE $this->tabela SET $this->primaryKeyUpdate=$this->primaryKeyUpdate";
		
		foreach ($this->array as $c){
			foreach ($c as $d=>$v){
				$qr .= ", $d = '$v'";
			}
		}
		$qr .= "WHERE $this->primaryKeyUpdate = '$id'";

		$this->queryStr = $qr;
		
		return $this->exec($qr);
	}
	
	
	/**
	 * Deleta o cadastro de um elemento
	 *
	 * @param Int $id
	 */
	public function delete($id){
		if(!is_array($id)){
			if(!$this->debugMode)
				return $this->exec("DELETE FROM $this->tabela WHERE $this->primaryKey = '$id' LIMIT 1");
			else
				echo "Deleta fisicamente o item $id da tabela: $this->tabela<br />";
		}
		else{
			//Se for array, deleta todos de uma só vez
			$ids = "'0'";
			foreach ($id as $i){
				$ids .= ", '$i' ";
			}
			if($this->debugMode)
				return $this->exec("DELETE FROM  $this->tabela WHERE $this->primaryKey IN($ids)");
			else{
				echo "Deleta fisicamente ".sizeof($ids). "itens da tabela $this->tabela. Os itens sao: ";
				$is = "";
				foreach ($ids as $f) {
					$is .=  "$f, ";
				}
				$is .= "FIM";
				echo str_replace(", FIM", "")."<br />";
				return true;
			}	
		}
		return false;
	}
	
	
	/**
	 * Retorna os dados de um elemento da tabela.
	 *
	 * @param Int $id
	 * @return Array
	 */
	public function get($id){
		if($this->debugMode)
			echo "Pegando os dados de $id da tabela $this->tabela<br />";
		if(!$this->getDadosFromView)		
		return $this->query("SELECT * FROM $this->tabela WHERE $this->primaryKey = '$id' LIMIT 1")->fetch();
		else
		return $this->query("SELECT * FROM $this->view WHERE $this->primaryKey = '$id' LIMIT 1")->fetch();
	}
	
	/**
	 * Lista os elementos de uma tabela pela ordem informada
	 *
	 * @return Query Id
	 */
	public function getList($order=null, $limit=99999){
		if(!$this->getDadosFromView)
		$qr = "SELECT * FROM $this->tabela";
		else
		$qr = "SELECT * FROM $this->view";
		
		if($order != null)
			$qr.= " ORDER BY $order ";
		
		if($this->debugMode){
			echo "LISTANDO OS DADOS DE $this->tabela<br />";
			echo "QUERY: <strong>$qr</strong><br />";
		}
		
		return $this->query($qr." LIMIT $limit");
	}
	
	
	/**
	 * Prepara o array $_POST aplicando alguns filtros padrões e mapeando-os com os campos existentes na tabela do banco de dados
	 * @param optional boolean $update default=false
	 */
	public function prepare($update=false){
		$campos = array();
		$fields = $this->descFields();
		foreach($fields as $f){
			$campos[] = $f->Field;
			if($this->debugMode)
				echo "<br />Campo (DB): ".$f->Field;	
		}
		
		$i=0;
		foreach ($_POST as $c=>$v) {
			if(in_array($c, $campos)){
				if($update){
					if(trim($v) != "") //Somente se o campo foi preenchido ele altera.
					$this->array[] = array($c => ($v));
				}else{				
					$this->array[] = array($c => ($v));
					$i++;
				}	
				if($this->debugMode){
					echo "<br />Combina: $c => $v";
				}
			}
		}

		if($this->debugMode){
			echo "<br /><br />Dados vindo do formulario: ";
			foreach ($_POST as $p => $v){
				echo "<br />$p => $v";
			}
			
			echo "<h3>Array gerado: </h3>";
			foreach ($this->array as $e => $v){
				foreach ($v as $d=>$f){
					echo "$d => $f<br />";
				}
			}
		}

	}
	
	/**
	 * Prepara o array $_POST para alteração de um dado
     */
	public function prepareUpdate(){
		if($this->debugMode)
		echo "<h2>Preparando para atualizar.</h2>";
		$this->prepare(true);
	}
	
	
	public function prepareDelete(){
		return true;
	}
	
	/**
	 * Descreve os campos da tabela
	 *
	 * @return array
     */
	public function descFields(){
		return $this->query("DESC $this->tabela");
	}
	
	/**
	 * Executa uma query no banco de dados
	 * @param String $qr
	 * @return PDOObject (ou booleano)
     */
	public function execute($qr){
		$this->queryStr = $qr;

		if(eregi("^SELECT", $qr)){
			$r = $this->query($qr);
			$this->pdoObject = $r;
		}
		else{
			$r = $this->exec($qr);
			$this->pdoObject = $r;
		}
		return $r;
	}
	
	
	/**
	 * Retorna o numero de linhas de um objeto PDO
	 * @param optional PDOStatement $obj
	 *
	 * @return int
     	*/
	public function linhas(PDOStatement $obj=null){
		return $obj == null ? $this->pdoObject->rowCount() : $obj->rowCount();
	}
	
	/**
	 * Retorna o ID gerado pela ultima inserção no banco de dados
	 *
	 * @return int
	 */
	public function lastInsertId(){
		return $this->lastInsertId();
	}
	
	
	/**
	 * Retorna um array (unidimensional) com a linha de uma determinada consulta
	 *
	 * @return array
     	*/
	public function getArray(){
		if($this->pdoObject)
			return $this->pdoObject->fetch();
		return array();
	}
	
	
}