<?php
session_start();
 
require_once '../functions/init.php';
 
require '../login/check.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <title>Cadastro de Categoria - Mr Slime</title>
		
	<!-- Bootstrap -->
    <link href="../_css/bootstrap.min.css" rel="stylesheet">
    </head>
 
    <body>
 
        <h1>Cadastro de Categoria - Mr Slime</h1>
         
        <form action="add.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name">
 
            <br><br>
 
            <label for="email">Email: </label>
            <br>
            <input type="text" name="email" id="email">
 
            <br><br>
 
            <input type="submit" value="Cadastrar">
        </form>
 
    </body>
</html>