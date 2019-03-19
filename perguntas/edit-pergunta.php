<?php
 
session_start();
 
require_once '../functions/init.php';
 
require '../login/check.php';
$PDO = db_connect();

$id = $_GET['id_pergunta'];
$sql = "SELECT *FROM PERGUNTAS WHERE id_pergunta = {$id}";
$stmt = $PDO->prepare($sql);

$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <title>Exibição de Perguntas - Mr Slime</title>
		
	<!-- Bootstrap -->
    <link href="../_css/bootstrap.min.css" rel="stylesheet">
	
	</head>
 
    <body>
         
        <h1>Perguntas Cadastradas - Mr Slime</h1>

        <form id="formatt" name="formatt" action="add.php" method="post">
                <label  style="margin-right: 50px;" for="name">Questao:</label>
                <input  style="width: 500px;" type="text" name="questao" id="questao" value="<?php echo $result['questao']?>"/>
                <br/>
                <label style="margin-right: 50px;" for="name"><br/>Dificud: <br/></label>
                <input style="width: 500px;" type="text" name="dificuldade" id="questao" value="<?php echo $result['nivel_dificuldade']?>"/>
                <br/>
                <label style="margin-right: 50px;"  for="name"><br/>Letra a:<br/> </label>
                <input style="width: 500px;" type="text" name="letra_a" id="letra_a" value="<?php echo $result['letra_a']?>"/>
                <br/>
                <label style="margin-right: 50px;"  for="name"><br/>Letra b:<br/> </label>
                <input style="width: 500px;" type="text" name="letra_b" id="letra_b" value="<?php echo $result['letra_b']?>"/>
                <br/>
                <label style="margin-right: 50px;"  for="name"><br/>Letra c:<br/> </label>
                <input style="width: 500px;" type="text" name="letra_c" id="letra_c" value="<?php echo $result['letra_c']?>"/>
                <br/>
                <label style="margin-right: 50px;"  for="name"><br/>Letra d<br/> </label>
                <input style="width: 500px;" type="text" name="letra_d" id="letra_d" value="<?php echo $result['letra_d']?>"/>

                <br/>
                <br/>                
                <input type="submit" value="Alterar">
                <button><a href="exibir_perguntas.php">Voltar</a></button>
        </form>
    </body>
</html>