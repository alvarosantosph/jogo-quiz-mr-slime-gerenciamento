<?php
 
session_start();
 
require_once '../functions/init.php';
 
require '../login/check.php';
 
// pega o ID da URL
$id = isset($_GET['id']) ? $_GET['id'] : null;
 
// valida o ID
if (empty($id))
{
    echo "ID não informado";
    exit;
}
 
// remove do banco
$PDO = db_connect();
$sql = "DELETE FROM cadastro WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: cadastro.php');
}
else
{
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}