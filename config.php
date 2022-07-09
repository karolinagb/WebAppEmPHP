<?php

// Fazer conexão com o BD
$mysql = new mysqli('localhost', 'root', 'root', 'blog');

//definir o charset do bd:
$mysql->set_charset('utf8');

if($mysql == true){
    echo "Banco conectado";
}
else{
    echo "Erro na conexão";
}