<?php


class DB
{
    /*-----------------------FUNÇÃO OBTÊM LISTA DE CARROS EM FORMA DE ARRAY--------------------------*/
    public static function obterListaCarros(): array
    {
        return json_decode(file_get_contents(__DIR__ . '/Carros.json'), true);
    }

    public static function gravarListaCarros(array $listaCarros):void
    {
        // Tranforma o array $dados_identificador em JSON
        $carrosCadastrados = json_encode($listaCarros, JSON_PRETTY_PRINT);

        $caminho = __DIR__ . '/Carros.json';

        file_put_contents($caminho, $carrosCadastrados);
    }
}