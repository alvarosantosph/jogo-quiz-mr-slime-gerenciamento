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

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <title>Cadastro de Perguntas - Mr Slime</title>
		
	<!-- Bootstrap -->
    <link href="../_css/bootstrap.min.css" rel="stylesheet">
    </head>
 
    <body onLoad="document.form1.pergunta.focus()">
 
        <h1>Cadastro de Perguntas - Mr Slime</h1>
		
		<br />
         
        <form id="form1" name="form1" action="add.php" method="post">
            <label for="name">Pergunta: </label>
			<br />
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<textarea rows="6" cols="50" name="pergunta" id="pergunta" maxlength="255" placeholder="Digite aqui a pergunta"></textarea>
 
            <br><br>
			
			<label for="name">Questão A: </label>
			&nbsp; &nbsp; <input type="text" name="letra_a" id="letra_a" style="width:800px"; maxlength="255" placeholder="Questão A">
 
            <br><br>
			
			
			<label for="name">Questão B: </label>
			&nbsp; &nbsp; <input type="text" name="letra_b" id="letra_b" style="width:800px"; maxlength="255" placeholder="Questão B">
 
            <br><br>

			
			<label for="name">Questão C: </label>
			&nbsp; &nbsp; <input type="text" name="letra_c" id="letra_c" style="width:800px"; maxlength="255" placeholder="Questão C">
 
            <br><br>

			
			<label for="name">Questão D: </label>
			&nbsp; &nbsp; <input type="text" name="letra_d" id="letra_d" style="width:800px"; maxlength="255" placeholder="Questão D">
 
            <br><br>
			
			<label for="name">Pontuação da Pergunta: </label>
			&nbsp; &nbsp; <input type="number" name="pontuacao" id="pontuacao" style="width:100px"; placeholder="Pontuação">
 
            <br><br>
			
						<label for="name">Resposta Correta: </label>
			&nbsp; &nbsp; <input type="text" name="resposta" id="resposta" style="width:800px"; maxlength="255" placeholder="Resposta Correta">
 
            <br><br>
			
						<label for="name">Letra Correta: </label>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="text" name="letra" id="letra" style="width:50px"; maxlength="1" placeholder="Letra">
 
            <br><br>
			
			<input type="hidden" name="id_categoria" value="<?php echo $id ?>">
 
            <input type="submit" value="Cadastrar">
        </form>
 
    </body>
</html>