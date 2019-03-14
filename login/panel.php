<?php
session_start();
 
require_once '../functions/init.php';
 
require 'check.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <title>Painel | Mr Slime</title>
		
	<!-- Bootstrap -->
    <link href="../_css/bootstrap.min.css" rel="stylesheet">
		
    </head>
 
    <body>
         
        <h1>Painel do Usuário</h1>
 
        <p>Bem-vindo ao Mr Slime, <?php echo $_SESSION['user_name']; ?> | <a href="logout.php">Sair</a></p>
    </body>
</html>