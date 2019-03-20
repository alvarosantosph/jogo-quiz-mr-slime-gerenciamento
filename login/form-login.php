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
	
	input[type=text]{   
    border-radius:4px;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    box-shadow: 1px 1px 2px #333333;    
    -moz-box-shadow: 1px 1px 2px #333333;
    -webkit-box-shadow: 1px 1px 2px #333333;
    background: #cccccc; 
    border:1px solid #000000;
    width:150px
	}
	
	input[type=password]{   
    border-radius:4px;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    box-shadow: 1px 1px 2px #333333;    
    -moz-box-shadow: 1px 1px 2px #333333;
    -webkit-box-shadow: 1px 1px 2px #333333;
    background: #cccccc; 
    border:1px solid #000000;
    width:150px
	}
 
	textarea{
    border: 1px solid #000000;
    background:#cccccc;
    width:150px;
    height:100px;
    border-radius:4px;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    box-shadow: 1px 1px 2px #333333;    
    -moz-box-shadow: 1px 1px 2px #333333;
    -webkit-box-shadow: 1px 1px 2px #333333;
	
 
	input[type=text]:hover, textarea:hover{ 
         background: #ffffff; border:1px solid #990000;
	}
 
	input[type=submit]{
        background:#006699;
        color:#ffffff;
	}
	
	</style>
		
    </head>
 
    <body onLoad="document.form1.name.focus()">
         
        <h1> Login</h1>
 
        <form id="form1" name="form1" action="login.php" method="post">
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