<?php 
require_once('game.class.php');

class Jogadores extends Game {
	
	public function __construct(){
		parent::__construct('player');
	}
	
	public function verificaJogador($email,$password) {
		return $this->query("SELECT * FROM $this->tabela WHERE email ='$email' AND password ='$password'")->Fetch();
		
	}
	
	public function verificaEmail($email) {
		return $this->query("SELECT * FROM $this->tabela WHERE email ='$email'")->Fetch();
		
	}
	
	
	public function verificaEmailAtualizar($email) {
		return $this->query("SELECT * FROM $this->tabela WHERE email ='$email' || id_player !='$id_player'")->Fetch();
		
	}
	
	
	public function buscaPerguntas() {
		return $this->query("SELECT * FROM selecionar_perguntas")->FetchAll();
		
	}
	
	public function buscaJogadores() {
		return $this->query("SELECT * FROM player ORDER BY pontuacao DESC LIMIT 3")->FetchAll();
		
	}
}
