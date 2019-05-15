<?php

session_start();

require_once '../functions/init.php';

require '../login/check.php';
$PDO = db_connect();

$id = $_GET['id_pergunta'];
$sql = "SET @ID = ".$id."; DELETE FROM pergunta_categoria where id_pergunta = @ID; DELETE FROM perguntas where id_pergunta = @ID;";

$stmt = $PDO->prepare($sql);

$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if(empty($result)){
  header('Location: exibir_perguntas.php');
}

?>