<?php
 
session_start();
 
require_once '../functions/init.php';
 
require '../login/check.php';
$PDO = db_connect();

$id = $_GET['id_pergunta'];
$sql = "SELECT  pe.id_pergunta, 
pe.questao,
pe.letra_a ,
pe.letra_b,
pe.letra_c,
pe.letra_d,
pe.nivel_dificuldade,
re.resposta_correta ,
re.letra_resposta_correta ,
ct.categoria 
FROM respostas_correta RE  
JOIN perguntas pe ON re.id_resposta = pe.id_resposta AND PE.ID_PERGUNTA = {$id}
JOIN pergunta_categoria pc ON pe.id_pergunta = pc.id_pergunta
JOIN categorias ct ON pc.id_categoria = ct.id_categoria;";

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
	
		<link href="../_css/estilo-formulario.css" rel="stylesheet">
	
	</head>
 
    <body>
         
        <h1>Alterar Perguntas - Mr Slime</h1>

        <br/>
        <br/>  
        
        <form style="margin-right: 30px; padding-left: 30px;" action="edit.php" method="post">
                <label  style="margin-right: 30px;" for="name">id_pergunta:</label>
                <input  style="width: 100px;" type="text" name="id_pergunta" id="id_pergunta" value="<?php echo $result['id_pergunta']?>"/>
                <br/>
                <br/>
                <label  style="margin-right: 50px;" for="name">Questao:</label>
                <input  style="width: 500px;" type="text" name="questao" id="questao" value="<?php echo $result['questao']?>"/>
                <br/>
                <label style="margin-right: 50px;" for="name"><br/>Dificuldade: <br/></label>
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
                <label style="margin-right: 50px;"  for="name"><br/>correta: <br/> </label>
                <input disabled style="width: 500px;" type="text" name="resposta_correta" id="resposta_correta" value="<?php echo $result['resposta_correta']?>"/>
                <br/>
                <label style="margin-right: 50px;"  for="name"><br/>resposta: <br/> </label>
                <input disabled   style="width: 500px;" type="text" name="letra_resposta_correta" id="letra_resposta_correta" value="<?php echo $result['letra_resposta_correta']?>"/>
                <br/>
                <label style="margin-right: 50px;"  for="name"><br/>categoria: <br/> </label>
                <input disabled  style="width: 500px;" type="text" name="categoria" id="categoria" value="<?php echo $result['categoria']?>"/>


                <br/>
                <br/>                
                <input type="submit">
                <button><a href="exibir_perguntas.php">Voltar</a></button>
        </form>
    </body>
</html>