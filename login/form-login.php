<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - MR Slime</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	

    <!-- Bootstrap -->
    <link href="../_css/bootstrap.min.css" rel="stylesheet">
    <link href="../_css/estilo-formulario.css" rel="stylesheet">

    <style>
        body {

            position: absolute;
            left: 38%;
            top: 30%;
            margin-left: -110px;
            margin-top: -40px;

        }
    </style>

</head>

<body onLoad="document.form1.name.focus()">
    <div class="container">
        <div class="row">
            <div class="col-md-6    ">
                <form id="form1" name="form1" action="login.php" method="post">
                    <div class="form-group">
                        <label for="name">Endereço de email</label>
                        <input type="email" name="name" id="name" placeholder="Seu email" class="form-control">
                        <small id="name" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
                    </div>

                    <div class="form-group">
                        <label for="passoword">Senha</label>
                        <input type="password" name="password" id="password" placeholder="Sua senha" class="form-control">
                    </div>
                    <button type="submit" value="Entrar" class="btn btn-primary">Enviar </button>
                    <a  value="Entrar" class="btn btn-danger" href="../index.php">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>