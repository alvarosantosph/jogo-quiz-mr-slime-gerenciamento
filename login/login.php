<?php
 
// inclui o arquivo de inicialização
require '../functions/init.php';
 
// resgata variáveis do formulário
$name = isset($_POST['name']) ? $_POST['name'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
 
if (empty($name) || empty($password))
{
    echo "Informe usuario e senha.";
    exit;
}
 
// cria o hash da senha
$passwordHash = make_hash($password);
 
$PDO = db_connect();
 
$sql = "SELECT id, name FROM users WHERE name = :name AND password = :password";
$stmt = $PDO->prepare($sql);
 
$stmt->bindParam(':name', $name);
$stmt->bindParam(':password', $passwordHash);
 
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($users) <= 0)
{
    echo "Usuario ou senha incorretos.";
    exit;
}
 
// pega o primeiro usuário
$user = $users[0];
 
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
 
header('Location: ../index.php');
?>