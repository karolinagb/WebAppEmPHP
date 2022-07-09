<?php

//require da erro se o arquivo n tiver na pagina
require 'config.php';
//include nao da erro, tenta executar da mesma forma
include 'Artigo.php';

$artigo = new Artigo($mysql);
$artigos = $artigo->exibeTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">

        <?php
            foreach ($artigos as $artigo) 
            :
        ?>
            <h2>
                <a href="<?php echo $artigo['link'] ?>">
                    <?php echo $artigo['titulo'] ?>
                </a>
            </h2>
            <p>
                <?php echo $artigo['conteudo'] ?>
            </p>
        <?php endforeach; ?>
       
    </div>
</body>

</html>