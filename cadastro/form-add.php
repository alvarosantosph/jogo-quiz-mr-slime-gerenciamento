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
	
	<link href="../_css/estilo-formulario.css" rel="stylesheet">
	
    </head>
 
    <body onLoad="document.form1.categoria.focus()">
 
        <h1>Cadastro de Categoria - Mr Slime</h1>
         
        <form id="form1" name="form1" action="add.php" method="post">
            <label for="name">Categoria: </label>
            <br>
            <input type="text" name="categoria" id="categoria">
 
            <br><br>
 
            <input type="submit" value="Cadastrar">
        </form>
 
    </body>
</html>