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
 
    <body onLoad="document.form1.pergunta.focus()">
 
        <h1>Cadastro de Perguntas - Mr Slime</h1>
		
		<br />
         
        <form id="form1" name="form1" action="add.php" method="post">
            <label for="name">Pergunta: </label>
			<br />
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<textarea rows="6" cols="50" name="pergunta" id="pergunta" placeholder="Digite aqui a pergunta"></textarea>
 
            <br><br>
			
			<label for="name">Nível de Dificuldade: </label>
			
			<select name="dificuldade" id="dificuldade">
			<option></option>
			<option value="1">Fácil</option>
			<option value="2">Médio</option>
			<option value="3">Difícil</option>
			</select>
			
			<br><br>
			
			<label for="name">Questão A: </label>
			&nbsp; &nbsp; <input type="text" name="letra_a" id="letra_a" style="width:800px"; placeholder="Questão A">
 
            <br><br>
			
			
			<label for="name">Questão B: </label>
			&nbsp; &nbsp; <input type="text" name="letra_b" id="letra_b" style="width:800px"; placeholder="Questão B">
 
            <br><br>

			
			<label for="name">Questão C: </label>
			&nbsp; &nbsp; <input type="text" name="letra_c" id="letra_c" style="width:800px"; placeholder="Questão C">
 
            <br><br>

			
			<label for="name">Questão D: </label>
			&nbsp; &nbsp; <input type="text" name="letra_d" id="letra_d" style="width:800px"; placeholder="Questão D">
 
            <br><br>
			
			<label for="name">Pontuação da Pergunta: </label>
			&nbsp; &nbsp; <input type="number" name="pontuacao" id="pontuacao" style="width:100px"; placeholder="Pontuação">
 
            <br><br>
			
						<label for="name">Resposta Correta: </label>
			&nbsp; &nbsp; <input type="text" name="resposta" id="resposta" style="width:800px"; placeholder="Resposta Correta">
 
            <br><br>
			
						<label for="name">Letra Correta: </label>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="text" name="letra" id="letra" style="width:50px"; maxlength="1" placeholder="Letra">
 
            <br><br>
			
			<input type="hidden" name="id_categoria" value="<?php echo $id ?>">
 
            <input type="submit" value="Cadastrar">
        </form>
 
    </body>
</html>