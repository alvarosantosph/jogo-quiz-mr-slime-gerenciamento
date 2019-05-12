<?php
ini_set('display_errors', 0);
header("Access-Control-Allow-Origin: *");
require_once("ranking.class.php");
$ranking = new Ranking();

if($_POST){
	$ranking->add();
}

if($_GET['lista'] == "sim"){

	$lista = $ranking->getList();
	foreach ($lista as $show) {
		echo "$show->nome $show->pts |";
	}
}