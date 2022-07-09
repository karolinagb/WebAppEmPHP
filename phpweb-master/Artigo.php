<?php

class Artigo
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function exibeTodos(): array
    {
        $resultado = $this->mysql->query('SELECT * FROM artigos');
        //retorna um tipo que o php entenda como um array associativo no caso do parâmetro MYSQLI_ASSOC
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $artigos;
    }
}