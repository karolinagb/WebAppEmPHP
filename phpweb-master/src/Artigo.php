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

    public function encontrarPorId(string $id)
    {
        // Não é seguro colocar o id na consulta direto porque podemos ter falhas de segurança como SQL injection
        // Vamos utilizar o conceito de consultas preparadas onde colocamos um ? onde esperamos um parâmetro
        $selecionaArtigo = $this->mysql->prepare('SELECT * FROM artigos WHERE id = ?');

        //Agora temos que vincular o ? com nosso id que estamos recebendo por argumento
        // bind_param 
            // argumentos: tipo do valor que a gente quer colocar (s = string), valor 
        $selecionaArtigo->bind_param('s', $id);

        //executar
        $selecionaArtigo->execute();

        //pegar o valor da execuçao e retornar como array associativo
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();

        return $artigo;
    }

    public function adicionar(string $titulo, string $conteudo): void
    {
        $insereArtigo = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) VALUES (?,?)');

        //ss = 2 valores como string
        $insereArtigo->bind_param('ss', $titulo, $conteudo);

        $insereArtigo->execute();
    }

    public function remover(string $id): void
    {
        $removerArtigo = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');

        $removerArtigo->bind_param('s', $id);

        $removerArtigo->execute();
    }
}