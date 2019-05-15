<?php

session_start();

require_once '../functions/init.php';

require '../login/check.php';

// abre a conexão
$PDO = db_connect();

// SQL para selecionar os registros
$sql = "SELECT * FROM selecionar_perguntas ORDER BY id_pergunta ASC";

$sql_count = "SELECT COUNT(*) AS total FROM perguntas ORDER BY id_pergunta ASC";

$id = isset($_GET['id_categoria']) ? (int)$_GET['id_categoria'] : null;

$select_by_cat = "SELECT * FROM selecionar_perguntas where id_categoria =" . $id;

if (!empty($id)) {
	// seleciona os registros
	$stmt = $PDO->prepare($select_by_cat);
	$stmt->execute();

	$stmt_count = $PDO->prepare($sql_count);
	$stmt_count->execute();
	$total = $stmt_count->fetchColumn();
} else {
	// seleciona os registros
	$stmt = $PDO->prepare($sql);
	$stmt->execute();

	$stmt_count = $PDO->prepare($sql_count);
	$stmt_count->execute();
	$total = $stmt_count->fetchColumn();
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<title>Exibição de Perguntas - Mr Slime</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Bootstrap -->
	<link href="../_css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
	<div class="container">
		<div class="row">
			<h1>Perguntas Cadastradas - Mr Slime</h1>
			<a href="../cadastro/cadastro.php" class="btn btn-primary" title="Voltar para página principal">
				<i class="fas fas fa-arrow-left"></i>
			</a>
			<hr>

		</div>

		<div class="row">

			<?php if ($total > 0) : ?>

				<?php while ($pergunta = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>

					<?php

					$nivel_dificuldade = $pergunta['DIFICULDADE'];
					$dificuldade = null;

					if ($nivel_dificuldade == 1) {

						$dificuldade = "Fácil";
					}

					if ($nivel_dificuldade == 2) {

						$dificuldade = "Médio";
					}

					if ($nivel_dificuldade == 3) {

						$dificuldade = "Díficil";
					}
					?>
					<ul class="list-group">
						<li class="list-group-item"><?php echo '<b>QUESTAO:</b><br /> ', $pergunta['QUESTAO'] ?></li>
						<li class="list-group-item"><?php echo '<b>OPCAO A:</b><br /> ', $pergunta['LETRA_A'] ?></li>
						<li class="list-group-item"> <?php echo '<b>OPCAO B:</b><br /> ', $pergunta['LETRA_B'] ?></li>
						<li class="list-group-item"><?php echo '<b>OPCAO C:</b><br /> ', $pergunta['LETRA_C'] ?></li>
						<li class="list-group-item"><?php echo '<b>OPCAO D:</b><br /> ', $pergunta['LETRA_D'] ?></li>
						<li class="list-group-item"><?php echo '<b>OPCAO D:</b><br /> ', $pergunta['RESPOSTA_CORRETA'] ?></li>
						<li class="list-group-item"><?php echo '<b>OPCAO D:</b><br /> ', $pergunta['LETRA_RESPOSTA_CORRETA'] ?></li>
						<li class="list-group-item"><?php echo '<b>OPCAO D:</b><br /> ', $pergunta['CATEGORIA'] ?></li>
						<li class="list-group-item">
							<a href="edit-pergunta.php?id_pergunta=<?php echo $pergunta['id_pergunta'] ?>" title="Editar pergunta" class="btn btn-primary">Editar <i class="fas fa-edit"></i></a>
							<a title="Deletar pergunta" class="btn btn-danger" data-toggle="modal" data-target="#ModalDeletar">Excluir <i class="fas fa-trash-alt"></i></a>
						</li>

					</ul>
					<hr>
					<!-- Modal deletar -->
					<div class="modal fade" id="ModalDeletar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel" >Deletar pergunta</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body text-center">
									Tem certeza que deseja excluir a pergunta: <?php echo $pergunta['QUESTAO'] ?>
								</div>
								<div class="modal-footer">
									<a href="delete-pergunta.php?id_pergunta=<?php echo $pergunta['id_pergunta'] ?>" class="btn btn-danger">Excluir <i class="fas fa-trash-alt"></i></a>
									<button type="button" class="btn btn-primary" data-dismiss="modal">Voltar <i class="fas fas fa-arrow-left"></i></button>
								</div>
							</div>
						</div>
					</div>

				<?php endwhile; ?>

			<?php else : ?>

				<p>Nenhuma pergunta registrada.</p>

			<?php endif; ?>

		</div>
	</div>



</body>

</html>