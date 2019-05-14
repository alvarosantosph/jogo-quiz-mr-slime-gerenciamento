<?php
session_start();

require 'functions/init.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - Mr Slime</title>

    <!-- Bootstr-ap -->
    
    <link href="_css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            text-align: center;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="row">
            <?php if (isLoggedIn()) : ?>
                <span style="color: #4682B4; font-weight: bold; font-size: 24px;">Olá, <?php echo $_SESSION['user_name']; ?></span><br /><a href="cadastro/cadastro.php">Painel</a> | <a href="login/logout.php">Sair</a></p>
            <?php else : ?>
                <span style="color: #4682B4; font-weight: bold; font-size: 24px;">SISTEMA DE GERENCIAMENTO DE PERGUNTAS</span><br /><a href="login/form-login.php">Login</a>
            <?php endif; ?>

            <center><img src="_imagens/mr-slime-logo-alterado.png" heignt="600" width="600" alt="SLIME" title"SLIME"></center>

        </div>
    </div>


</body>

</html>