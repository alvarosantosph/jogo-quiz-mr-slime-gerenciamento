<?php
header("Access-Control-Allow-Origin: *");
ini_set('display_errors', 1);
require_once("jogadores.class.php");
$jogadores = new Jogadores();

if ($_POST['acao'] == "login") {
		$email = $_POST["email"];
		$password = sha1(md5($_POST["password"]));
		$verifica = $jogadores->verificaJogador($email,$password);
		if ($verifica) {
			die("1,$verifica->id_player,$verifica->user_name,$verifica->email,$verifica->pontuacao");
		} else {
			die("0");
		}
	}
if ($_POST['acao'] == "cadastra") {
		$user_name = $_POST["user_name"];
		$email = $_POST["email"];
		$_POST["password"] = sha1(md5($_POST["password"]));
		$verifica2 = $jogadores->verificaEmail($_POST["email"]);
		if ($verifica2) {
			die("2");
	}
if (empty($_POST["user_name"]) || empty($_POST["email"]) || $_POST["password"] == '67a74306b06d0c01624fe0d0249a570f4d093747') {	
		die("3");
	}
	if ($jogadores->add()) {
		die("1");
	} else {
		die("0");
	}
}

if ($_POST['acao'] == "atualiza") {
	$_POST['id_player'] = $_POST['id_player'];
	$_POST['user_name'] = $_POST['user_name'];
	$_POST['email'] = $_POST['email'];
	$_POST['password'] = sha1(md5($_POST['password']));
	$verifica3 = $jogadores->verificaEmail($_POST['email']);
	if ($verifica3) {
		die("2");
	}
	if (empty($_POST['user_name']) || empty($_POST['email']) || $_POST['password'] == '67a74306b06d0c01624fe0d0249a570f4d093747') {	
		die("3");
	}
	if ($jogadores->update($_POST['id_player'])) {
		die("1");
	} else {
		die("0");
	}
}

if ($_GET['acao'] == "buscaPerguntas") {
	$lista = $jogadores->buscaPerguntas();

	foreach ($lista as $show) {

		echo "$show->QUESTAO*";
		echo "$show->LETRA_A*";
		echo "$show->LETRA_B*";
		echo "$show->LETRA_C*";
		echo "$show->LETRA_D*";
		echo "$show->RESPOSTA_CORRETA*";
		echo "|";
	
	}	
}
	
if ($_GET['acao'] == "buscaJogadores") {
	$lista = $jogadores->buscaJogadores();

	foreach ($lista as $show) {

		echo "$show->user_name : $show->pontuacao \n";
		
	}
}

if ($_POST['acao'] == "atualizaPontuacao") {
	$_POST['id_player'] = $_POST['id_player'];
	$_POST['pontuacao'] = $_POST['pontuacao'];
	
	if ($jogadores->update($_POST['id_player'])) {
		die("1");
	} else {
		die("0");
	}
}