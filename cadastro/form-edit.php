<?php

session_start();
 
require_once '../functions/init.php';
 
require '../login/check.php';
 
// pega o ID da URL
$id = isset($_GET['id_categoria']) ? (int) $_GET['id_categoria'] : null;
 
// valida o ID
if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}
 
// busca os dados du usuário a ser editado
$PDO = db_connect();
$sql = "SELECT categoria FROM categorias WHERE id_categoria = :id_categoria";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_categoria', $id, PDO::PARAM_INT);
 
$stmt->execute();
 
$user = $stmt->fetch(PDO::FETCH_ASSOC);
 
// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($user))
{
    echo "Nenhuma categoria encontrada";
    exit;
}
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <title>Edição de Categoria - Mr Slime</title>
		
	<!-- Bootstrap -->
    <link href="../_css/bootstrap.min.css" rel="stylesheet">
	
		<style>
	
	input[type=text]{   
    border-radius:4px;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    box-shadow: 1px 1px 2px #333333;    
    -moz-box-shadow: 1px 1px 2px #333333;
    -webkit-box-shadow: 1px 1px 2px #333333;
    background: #cccccc; 
    border:1px solid #000000;
    width:150px
	}
 
	textarea{
    border: 1px solid #000000;
    background:#cccccc;
    width:150px;
    height:100px;
    border-radius:4px;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    box-shadow: 1px 1px 2px #333333;    
    -moz-box-shadow: 1px 1px 2px #333333;
    -webkit-box-shadow: 1px 1px 2px #333333;
	
 
	input[type=text]:hover, textarea:hover{ 
         background: #ffffff; border:1px solid #990000;
	}
 
	input[type=submit]{
        background:#006699;
        color:#ffffff;
	}
	
	</style>
	
    </head>
 
    <body onLoad="document.form1.categoria.focus()">
 
        <h1>Edição de Cadastro - Mr Slime</h1>
         
        <form id="form1" name="form1" action="edit.php" method="post">
            <label for="name">Categoria: </label>
            <br>
            <input type="text" name="categoria" id="categoria" value="<?php echo $user['categoria'] ?>">
 
            <br><br>
 
            <input type="hidden" name="id_categoria" value="<?php echo $id ?>">
 
            <input type="submit" value="Alterar">
        </form>
 
    </body>
</html>