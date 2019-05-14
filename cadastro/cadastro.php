<?php

session_start();

require_once '../functions/init.php';

require '../login/check.php';

// abre a conexão
$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM categorias ORDER BY categoria ASC";

$sql_count_perguntas = "SELECT COUNT(*) AS total FROM perguntas";

// SQL para selecionar os registros
$sql = "SELECT id_categoria, categoria FROM categorias ORDER BY categoria ASC";

// conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

$stmt_count_perguntas = $PDO->prepare($sql_count_perguntas);
$stmt_count_perguntas->execute();
$total_perguntas = $stmt_count_perguntas->fetchColumn();

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Cadastro - Mr Slime</title>

	<!-- Bootstrap -->
	<link href="../_css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
	<script language="JavaScript">
		function move_i(what) {
			what.style.background = '#d3d3d3';
		}

		function move_o(what) {
			what.style.background = '#ffffff';
		}
	</script>

</head>

<body>
	<div class="container">
		<div class="row">
			<h1 class="justify-content-center">Sistema de Cadastro - Mr Slime</h1>

			<p><a href="../index.php">Painel</a> | <a href="form-add.php">Adicionar Categoria</a> | <a href="../perguntas/exibir_perguntas.php">Exibir Perguntas</a> | <a href="../login/logout.php">Sair</a></p>

			<h2 class="justify-content-center">Lista de Categorias</h2>

			<div class="col-md-8">
				<div class="alert alert-info col-md-3" role="alert">
					<p>Total de categorias: <?php echo $total ?></p>
				</div>

				<div class="alert alert-info col-md-3" role="alert">
					<p>Total de perguntas: <?php echo $total_perguntas ?></p>
				</div>
			</div>
			<div class="col-md-4">
					<form id="form1" name="form1" action="add.php" method="post" onLoad="document.form1.categoria.focus()" class="form-group">
						<input type="text" name="categoria" id="categoria" class="form-control" placeholder="Informe a categoria">
						<button type="submit" class="btn btn-success" style="margin:7px;" title="Cadastrar nova categoria" >Cadastrar</button>
					</form>
				</div>
			<?php if ($total > 0) : ?>
			</div>
			<div class="row">
				<table class="table">
					<thead>
						<tr>
							<th class="col-md-8">Categoria</th>
							<th class="col-md-2 justify-content-center">Funcionalidades</th>
							<th class="col-md-2 justify-content-center">Total por categoria</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>




							<?php

							$contador_categorias = $user['id_categoria'];

							$sql_count_categorias = "SELECT COUNT(*) FROM selecionar_categorias WHERE identificador = '$contador_categorias'";
							$stmt_count_categorias = $PDO->prepare($sql_count_categorias);
							$stmt_count_categorias->execute();
							$total_categorias = $stmt_count_categorias->fetchColumn();

							?>


							<tr onmouseover="move_i(this)" onmouseout="move_o(this)">
								<td><?php echo $user['categoria'] ?></td>
								<td>
									<a href="../perguntas/form-add.php?id_categoria=<?php echo $user['id_categoria'] ?>" title="Cadastrar Perguntas" type="button" class="btn btn btn-success btn-sm justify-content-center">
										<i class="fas fa-save"></i>
									</a>

									<a href="form-edit.php?id_categoria=<?php echo $user['id_categoria'] ?>" title="Editar pergunta" type="button" class="btn btn btn-primary btn-sm justify-content-center">
										<i class="fas fa-edit"></i>
									</a>
								</td>
								<td> <span class="justify-content-center"><?php echo $total_categorias ?> </span></td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>

	<?php else : ?>

		<p>Nenhuma categoria registrada.</p>

	<?php endif; ?>
</body>

</html>