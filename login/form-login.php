<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <title>Login - MR Slime</title>
		
	<!-- Bootstrap -->
    <link href="../_css/bootstrap.min.css" rel="stylesheet">
	
	<style>
	
	body {

		position:absolute;
		left:50%;
		top:30%;
		margin-left:-110px;
		margin-top:-40px;
	
	}
	
	</style>
		
    </head>
 
    <body>
         
        <h1> Login</h1>
 
        <form action="login.php" method="post">
            <label for="name">Usuário: </label>
            <br>
            <input type="text" name="name" id="name" placeholder="Usuário">
 
            <br><br>
 
            <label for="password">Senha: </label>
            <br>
            <input type="password" name="password" id="password" placeholder="Senha">
 
            <br><br>
 
            <input type="submit" value="Entrar">
        </form>
 
    </body>
</html>