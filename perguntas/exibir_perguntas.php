<?php

session_start();

require_once '../functions/init.php';

require '../login/check.php';

// abre a conexão
$PDO = db_connect();

// SQL para selecionar os registros
$sql = "SELECT * FROM selecionar_perguntas ORDER BY id_pergunta ASC";

$sql_count = "SELECT COUNT(*) AS total FROM perguntas ORDER BY id_pergunta ASC";

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();

$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

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

	<!-- Bootstrap -->
	<link href="../_css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
	<div class="container">
		<div class="row">
			<h1>Perguntas Cadastradas - Mr Slime</h1>
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
						<li class="list-group-item">	<?php echo '<b>OPCAO B:</b><br /> ', $pergunta['LETRA_B'] ?></li>
						<li class="list-group-item"><?php echo '<b>OPCAO C:</b><br /> ', $pergunta['LETRA_C'] ?></li>
						<li class="list-group-item"><?php echo '<b>OPCAO D:</b><br /> ', $pergunta['LETRA_D'] ?></li>
						<li class="list-group-item"><?php echo '<b>OPCAO D:</b><br /> ', $pergunta['RESPOSTA_CORRETA'] ?></li>
						<li class="list-group-item"><?php echo '<b>OPCAO D:</b><br /> ', $pergunta['LETRA_RESPOSTA_CORRETA'] ?></li>
						<li class="list-group-item"><?php echo '<b>OPCAO D:</b><br /> ', $pergunta['CATEGORIA'] ?></li>
						<li class="list-group-item"> 
							<a href="edit-pergunta.php?id_pergunta=<?php echo $pergunta['id_pergunta'] ?>" title="Editar" class="btn btn-primary">Editar <i class="fas fa-edit"></i></a>
							<a href="edit-pergunta.php?id_pergunta=<?php echo $pergunta['id_pergunta'] ?>" title="Editar" class="btn btn-danger">Excluir <i class="fas fa-trash-alt"></i></a>
					</li>
						
					</ul>
					<hr>
				<?php endwhile; ?>

			<?php else : ?>

				<p>Nenhuma pergunta registrada.</p>

			<?php endif; ?>

		</div>
	</div>

</body>

</html>