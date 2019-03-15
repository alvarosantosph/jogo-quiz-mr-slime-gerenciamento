<?php

session_start();
 
require_once '../functions/init.php';
 
require '../login/check.php';
 
// abre a conexão
$PDO = db_connect();
 
$sql_count = "SELECT COUNT(*) AS total FROM categorias ORDER BY categoria ASC";
 
// SQL para selecionar os registros
$sql = "SELECT id_categoria, categoria FROM categorias ORDER BY categoria ASC";
 
// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
 
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
	
	</head>
 
    <body>
         
        <h1>Sistema de Cadastro - Mr Slime</h1>
         
        <p><a href="../index.php">Painel</a> | <a href="form-add.php">Adicionar Categoria</a> | <a href="../login/logout.php">Sair</a></p>
 
        <h2>Lista de Categorias</h2>
 
        <p>Total de categorias: <?php echo $total ?></p>
 
        <?php if ($total > 0): ?>
 
        <table width="50%" border="1">
            <thead>
                <tr>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $user['categoria'] ?></td>
                    <td>
                        <a href="form-edit.php?id_categoria=<?php echo $user['id_categoria'] ?>" title="Editar">Editar | </a>
                        <a href="delete.php?id_categoria=<?php echo $user['id_categoria'] ?>" title="Excluir" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
 
        <?php else: ?>
 
        <p>Nenhuma categoria registrada.</p>
 
        <?php endif; ?>
    </body>
</html>