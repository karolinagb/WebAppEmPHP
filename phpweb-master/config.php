<?php

// Fazer conexão com o BD
$mysql = new mysqli('localhost', 'root', 'root', 'blog');

//definir o charset do bd:
$mysql->set_charset('utf8');

if($mysql == false){
    echo "Erro na conexão";
}