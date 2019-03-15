<?php
 
session_start();
 
require_once '../functions/init.php';
 
require '../login/check.php';
 
// pega o ID da URL
$id = isset($_GET['id_categoria']) ? $_GET['id_categoria'] : null;
 
// valida o ID
if (empty($id))
{
    echo "ID não informado";
    exit;
}
 
// remove do banco
$PDO = db_connect();
$sql = "DELETE FROM categorias WHERE id_categoria = :id_categoria";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_categoria', $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: cadastro.php');
}
else
{
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}