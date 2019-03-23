<?php
session_start();
 
require 'functions/init.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <title>Login - Mr Slime</title>
		
	<!-- Bootstr-ap -->
    <link href="_css/bootstrap.min.css" rel="stylesheet">
	
	<style>
	
	body {
			text-align: center;
	}
	
	</style>
		
    </head>
 
    <body>
         
		<center><img src="_imagens/mr-slime-logo-alterado.png" heignt="600" width="600" alt="SLIME" title"SLIME"></center>
		
	            <h1>Mr Slime - Gerenciamento de Perguntas e Respostas </h1>
 
        <?php if (isLoggedIn()): ?>
            <p>Olá, <?php echo $_SESSION['user_name']; ?>. <a href="cadastro/cadastro.php">Painel</a> | <a href="login/logout.php">Sair</a></p>
        <?php else: ?>
            <p>Olá, visitante. <a href="login/form-login.php">Login</a></p>
        <?php endif; ?>
 
    </body>
</html>
