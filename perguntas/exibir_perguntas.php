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
 
        <title>Exibição de Perguntas - Mr Slime</title>
		
	<!-- Bootstrap -->
    <link href="../_css/bootstrap.min.css" rel="stylesheet">
	
	</head>
 
    <body>
         
        <h1>Perguntas Cadastradas - Mr Slime</h1>
         
        <?php if ($total > 0): ?>
 
                <?php while ($pergunta = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
				
				<?php echo "<hr>"; ?>
					<?php echo '<b>QUESTAO:</b><br /> ', $pergunta['QUESTAO'] ?><br /><br />
					<?php echo '<b>OPCAO A:</b><br /> ', $pergunta['LETRA_A'] ?><br /><br />
					<?php echo '<b>OPCAO B:</b><br /> ', $pergunta['LETRA_B'] ?><br /><br />
					<?php echo '<b>OPCAO C:</b><br /> ', $pergunta['LETRA_C'] ?><br /><br />
					<?php echo '<b>OPCAO D:</b><br /> ', $pergunta['LETRA_D'] ?><br /><br />
					<?php echo '<b>RESPOSTA:</b><br /> ', $pergunta['RESPOSTA_CORRETA'] ?><br /><br />
					<?php echo '<b>OPCAO CORRETA:</b> ', $pergunta['LETRA_RESPOSTA_CORRETA'] ?><br /><br />
					<?php echo '<b>CATEGORIA:</b> ', $pergunta['CATEGORIA'] ?><br /><br />
				<?php echo "<hr>"; ?>
  
                <?php endwhile; ?>
 
        <?php else: ?>
 
        <p>Nenhuma pergunta registrada.</p>
 
        <?php endif; ?>
    </body>
</html>