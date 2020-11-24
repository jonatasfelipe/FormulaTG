<?php


class DB
{
    public static function obterListaCarros(): array
    {
        return json_decode(file_get_contents(__DIR__ . '/Carros.json'), true);
    }

    public static function gravarListaCarros(array $listaCarros): void
    {
        // Tranforma o array em JSON
        $carrosCadastrados = json_encode($listaCarros, JSON_PRETTY_PRINT);

        $caminho = __DIR__ . '/Carros.json';

        file_put_contents($caminho, $carrosCadastrados);
    }

    public static function obterStatusCorrida(): array
    {
        return json_decode(file_get_contents(__DIR__ . '/Corrida.json'), true);
    }

    public static function gravarStatusCorrida($statusAtual): void
    {
        $statusEncontrado = json_encode($statusAtual, JSON_PRETTY_PRINT);

        $caminho = __DIR__ . '/Corrida.json';

        file_put_contents($caminho, $statusEncontrado);
    }

    public static function guardaHistoricoCorrida($historico): void
    {
        // Tranforma o array $dados_identificador em JSON
        $historicoUltrapassagem = json_encode($historico, JSON_PRETTY_PRINT);

        $caminho = __DIR__ . '/Historico.json';

        file_put_contents($caminho, $historicoUltrapassagem);
    }

    public static function obterHistoricoCorrida(): array
    {
        return json_decode(file_get_contents(__DIR__ . '/Historico.json'), true);
 }

}