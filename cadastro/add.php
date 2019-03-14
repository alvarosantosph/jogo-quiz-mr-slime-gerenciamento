<?php
 
session_start();
 
require_once '../functions/init.php';
 
require '../login/check.php';
 
// pega os dados do formuário
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($name) || empty($email))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO cadastro(name, email) VALUES(:name, :email)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email); 
 
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