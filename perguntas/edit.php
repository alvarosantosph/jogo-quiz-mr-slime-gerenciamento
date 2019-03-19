<?php
 
session_start();
 
require_once '../functions/init.php';
 
require '../login/check.php';
 
$id = $_POST['id_pergunta'];
$questao = $_POST['questao'];
$dificuldade = $_POST['dificuldade'];
$letra_a = $_POST ['letra_a'];
$letra_b = $_POST ['letra_b'];
$letra_c = $_POST ['letra_c'];
$letra_d = $_POST ['letra_d'];

echo $id;
$SQL = "UPDATE perguntas SET questao = ?, letra_a = ?, letra_b= ?, letra_c = ?, letra_d = ?, nivel_dificuldade = ? where id_pergunta  = ?";


$PDO = db_connect();
$stmt = $PDO->prepare($SQL);
$stmt->bindParam(1, $questao);
$stmt->bindParam(2, $letra_a);
$stmt->bindParam(3, $letra_b);
$stmt->bindParam(4, $letra_c);
$stmt->bindParam(5, $letra_d);
$stmt->bindParam(6, $dificuldade);
$stmt->bindParam(7, $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: exibir_perguntas.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}