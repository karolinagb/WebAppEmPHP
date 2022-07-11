<?php

function redireciona(string $url) : void
{
    //redirecionar para um pagina
    //temos que redirecionar para o get senao ele sempre carrega o post
    header("Location: $url");

     //Assim que redirecionar é importante que ele não carregue mais nenhuma requisição do post
    //Para para a execução:
    die();
}