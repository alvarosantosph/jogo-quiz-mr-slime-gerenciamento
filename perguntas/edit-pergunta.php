<?php

session_start();

require_once '../functions/init.php';

require '../login/check.php';
$PDO = db_connect();

$id = $_GET['id_pergunta'];
$sql = "SELECT  pe.id_pergunta, 
pe.questao,
pe.letra_a ,
pe.letra_b,
pe.letra_c,
pe.letra_d,
pe.nivel_dificuldade,
re.resposta_correta ,
re.letra_resposta_correta ,
ct.categoria 
FROM respostas_correta RE  
JOIN perguntas pe ON re.id_resposta = pe.id_resposta AND PE.ID_PERGUNTA = {$id}
JOIN pergunta_categoria pc ON pe.id_pergunta = pc.id_pergunta
JOIN categorias ct ON pc.id_categoria = ct.id_categoria;";

$stmt = $PDO->prepare($sql);

$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Exibição de Perguntas - Mr Slime</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Bootstrap -->
  <link href="../_css/bootstrap.min.css" rel="stylesheet">

  <link href="../_css/estilo-formulario.css" rel="stylesheet">

</head>

<body>
  
  <div class="container">
    <div class="row">
      <div class="justify-content-center">
        <h1>Alterar Perguntas - Mr Slime</h1>
      </div>
    </div>

    <hr>
    <div class="row">
      <div class="col-md-12">
        <form action="edit.php" method="post">
          <div class="form-group">
            <label for="name">Questao:</label>
            <input class="form-control" type="text" name="questao" id="questao" value="<?php echo $result['questao'] ?>" />
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label for="name"><br />Dificuldade: <br /></label>
              <input class="form-control" type="text" name="dificuldade" id="questao" value="<?php echo $result['nivel_dificuldade'] ?>" />
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="categoria"><br />categoria: <br /> </label>
              <input disabled class="form-control" type="text" name="categoria" id="categoria" value="<?php echo $result['categoria'] ?>" />
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group"></div>
            <label for="letra_resposta_correta">resposta: <br /></label>
            <input class="form-control" type="text" name="letra_resposta_correta" id="letra_resposta_correta" value="<?php echo $result['letra_resposta_correta'] ?>" />
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label for="name"><br />Identificador: <br /></label>
              <input class="form-control" type="text" name="id_pergunta" id="id_pergunta" value="<?php echo $result['id_pergunta'] ?>" />
            </div>
          </div>
          <div class="form-group">
            <label style="margin-right: 50px;" for="name"><br />Letra a:<br /> </label>
            <input class="form-control" type="text" name="letra_a" id="letra_a" value="<?php echo $result['letra_a'] ?>" />
          </div>
          <div class="form-group">
            <label style="margin-right: 50px;" for="name"><br />Letra b:<br /> </label>
            <input class="form-control" type="text" name="letra_b" id="letra_b" value="<?php echo $result['letra_b'] ?>" />
          </div>
          <div class="form-group">
            <label style="margin-right: 50px;" for="name"><br />Letra c:<br /> </label>
            <input class="form-control" type="text" name="letra_c" id="letra_c" value="<?php echo $result['letra_c'] ?>" />
          </div>
          <div class="form-group">
            <label style="margin-right: 50px;" for="name"><br />Letra d<br /> </label>
            <input class="form-control" type="text" name="letra_d" id="letra_d" value="<?php echo $result['letra_d'] ?>" />
          </div>
          <div class="form-group">
            <label style="margin-right: 50px;" for="name"><br />correta: <br /> </label>
            <input  class="form-control" type="text" name="resposta_correta" id="resposta_correta" value="<?php echo $result['resposta_correta'] ?>" />
          </div>



          <button type="submit" class="btn btn-primary">Salvar <i class="fas fa-save"></i></button>
          <a href="exibir_perguntas.php" class="btn btn-danger">Voltar <i class="fas fas fa-arrow-left"></i></a>
      </div>


      </form>
    </div>
  </div>
  </div>
</body>

</html>