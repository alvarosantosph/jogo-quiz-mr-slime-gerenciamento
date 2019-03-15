<?php
 
session_start();
 
require_once '../functions/init.php';
 
require '../login/check.php';
 
// resgata os valores do formulário
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
$id = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : null;
 
// validação (bem simples, mais uma vez)
if (empty($categoria))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
 
// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE categorias SET categoria = :categoria WHERE id_categoria = :id_categoria";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':categoria', $categoria);
$stmt->bindParam(':id_categoria', $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: cadastro.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}