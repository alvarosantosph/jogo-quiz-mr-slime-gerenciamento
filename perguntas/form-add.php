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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link href="../_css/estilo-formulario.css" rel="stylesheet">
		
	
    </head>
 
    <body onLoad="document.form1.pergunta.focus()">
		<div class="container">
			<div class="row">
				<h1>Cadastro de Perguntas - Mr Slime</h1>
			</div>
			<hr>
			<div class="row">
				
				<div class="col-md-12">
					<form id="form1" name="form1" action="add.php" method="post">	

					<div class="form-group">
						<input type="text" name="pergunta" id="pergunta" placeholder="Digite aqui a pergunta" class="md-textarea form-control">
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<select name="dificuldade" id="dificuldade" class="form-control">
									<option value="">Dificuldade</option>
									<option value="1">Fácil</option>
									<option value="2">Médio</option>
									<option value="3">Difícil</option>
							</select>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<input type="number" name="pontuacao" id="pontuacao" placeholder="Pontuação" class="form-control">
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">			
							<input type="text" name="resposta" id="resposta" placeholder="Resposta Correta" class="form-control">
						</div>
					</div>
			
					<div class="col-md-3">
						<div class="form-group">
				    		<input type="text" name="letra" id="letra"  maxlength="1" placeholder="Letra" class="form-control">
						</div>
					</div>

					<div class="form-group">			
						<input type="text" name="letra_a" id="letra_a" placeholder="Informe a alternativa a" class="form-control">
					</div>

					<div class="form-group">
						<input type="text" name="letra_b" id="letra_b"  placeholder="Informe a alternativa b" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="letra_c" id="letra_c" placeholder="Informe a alternativa c" class="form-control">
					</div>
					
					<div class="form-group">
						<input type="text" name="letra_d" id="letra_d"  placeholder="Informe a alternativa d" class="form-control">
					</div>		
					
					<input type="hidden" name="id_categoria" value="<?php echo $id ?>">
		
					<button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save"></i></button>
					<a class="btn btn-danger" href="../cadastro/cadastro.php">Voltar <i class="fas fas fa-arrow-left"></i></a>
				</form>
				</div>
			</div>
		</div>
    </body>
</html>