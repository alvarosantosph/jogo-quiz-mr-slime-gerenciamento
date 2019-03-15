<?php
 
session_start();
 
require_once '../functions/init.php';
 
require '../login/check.php';
 
// pega os dados do formuário
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($categoria))
{
    echo "Volte e preencha o campo";
    exit;
}
 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO categorias(categoria) VALUES(:categoria)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':categoria', $categoria);
 
if ($stmt->execute())
{
    header('Location: cadastro.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>