<?php

require '../config.php';
require '../src/Artigo.php';

//Botar esse codigo para executar so quando estivermos usando requisição post

//Tem informações sobre o ambiente que o PHP está executando a requisição ou resposta
// REQUEST_METHOD= vamos usar para verificar se a requisição é get ou post
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $artigo = new Artigo($mysql);
    $artigo->adicionar($_POST['titulo'], $_POST['conteudo']);

    //redirecionar para um pagina
    //temos que redirecionar para o get senao ele sempre carrega o post
    header('Location: adicionar-artigo.php');

    //Assim que redirecionar é importante que ele não carregue mais nenhuma requisição do post
    //Para para a execução:
    die();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="adicionar-artigo.php" method="post">
            <p>
                <label for="">Digite o título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"></textarea>
            </p>
            <p>
                <button class="botao">Criar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>