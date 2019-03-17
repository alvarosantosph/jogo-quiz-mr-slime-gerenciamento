<?php

session_start();
 
require_once '../functions/init.php';
 
require '../login/check.php';
 
// abre a conexão
$PDO = db_connect();
 
// SQL para selecionar os registros
$sql = "SELECT * FROM perguntas ORDER BY id_pergunta ASC";

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
 
        <title>Exibição de Perguntas - Mr Slime</title>
		
	<!-- Bootstrap -->
    <link href="../_css/bootstrap.min.css" rel="stylesheet">
	
	</head>
 
    <body>
         
        <h1>Perguntas Cadastradas - Mr Slime</h1>
         
        <?php if ($total > 0): ?>
 
        <table width="50%" border="1">
            <thead>
                <tr>
                    <th>Pergunta</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($pergunta = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $pergunta['questao'] ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
 
        <?php else: ?>
 
        <p>Nenhuma pergunta registrada.</p>
 
        <?php endif; ?>
    </body>
</html>