<?php
 
session_start();
 
require_once '../functions/init.php';
 
require '../login/check.php';
 
// pega os dados do formuário
$pergunta = isset($_POST['pergunta']) ? $_POST['pergunta'] : null;
$letra_a = isset($_POST['letra_a']) ? $_POST['letra_a'] : null;
$letra_b = isset($_POST['letra_b']) ? $_POST['letra_b'] : null;
$letra_c = isset($_POST['letra_c']) ? $_POST['letra_c'] : null;
$letra_d = isset($_POST['letra_d']) ? $_POST['letra_d'] : null;
$pontuacao = isset($_POST['pontuacao']) ? $_POST['pontuacao'] : null;
$resposta = isset($_POST['resposta']) ? $_POST['resposta'] : null;
$letra = isset($_POST['letra']) ? $_POST['letra'] : null;
$id = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : null;
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($pergunta) || empty($letra_a) || empty($letra_b) || empty($letra_c) || empty($letra_d) || empty($pontuacao) || empty($resposta) || empty($letra))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
$PDO = db_connect();
 
// insere no banco
$sql = "INSERT INTO perguntas(letra_a, letra_b, letra_c, letra_d, questao, pontuacao_pergunta) VALUES(:letra_a,:letra_b,:letra_c,:letra_d,:questao,:pontuacao_pergunta)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':letra_a', $letra_a);
$stmt->bindParam(':letra_b', $letra_b);
$stmt->bindParam(':letra_c', $letra_c);
$stmt->bindParam(':letra_d', $letra_d);
$stmt->bindParam(':questao', $pergunta);
$stmt->bindParam(':pontuacao_pergunta', $pontuacao);
$stmt->execute();

// insere no banco
$sql2 = "INSERT INTO respostas_correta(resposta_correta, letra_resposta_correta) VALUES(:resposta_correta, :letra_resposta_correta)";
$stmt2 = $PDO->prepare($sql2);
$stmt2->bindParam(':resposta_correta', $resposta);
$stmt2->bindParam(':letra_resposta_correta', $letra);
$stmt2->execute();


// busca o ID da pergunta
$sql3 = "SELECT * FROM perguntas ORDER BY id_pergunta DESC limit 1";
$stmt3 = $PDO->prepare($sql3);
$stmt3->execute();
$id_pergunta_query = $stmt3->fetch();
$id_pergunta_result = $id_pergunta_query['id_pergunta'];


// insere no banco tabela n:n
$sql4 = "INSERT INTO pergunta_categoria(id_categoria, id_pergunta) VALUES(:id_categoria, :id_pergunta)";
$stmt4 = $PDO->prepare($sql4);
$stmt4->bindParam(':id_categoria', $id);
$stmt4->bindParam(':id_pergunta', $id_pergunta_result);
$stmt4->execute();


// busca o ID da resposta correta
$sql5 = "SELECT * FROM respostas_correta ORDER BY id_resposta DESC limit 1";
$stmt5 = $PDO->prepare($sql5);
$stmt5->execute();
$id_pergunta_query2 = $stmt5->fetch();
$id_pergunta_result2 = $id_pergunta_query2['id_resposta'];


// atualiza campo id_reposta da tabela perguntas
$sql6 = "UPDATE perguntas SET id_resposta = :id_resposta WHERE id_pergunta = :id_pergunta";
$stmt6 = $PDO->prepare($sql6);
$stmt6->bindParam(':id_resposta', $id_pergunta_result2);
$stmt6->bindParam(':id_pergunta', $id_pergunta_result, PDO::PARAM_INT);

 
if ($stmt6->execute())
{
    header('Location: ../cadastro/cadastro.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>