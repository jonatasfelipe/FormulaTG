<?php

require_once 'Model/DB.php';

class ImprimeListaCarros
{
    public static function imprimeListaCarrosFormatada(): void
    {
        $obterListaCarros = DB::obterListaCarros();

        foreach ($obterListaCarros as $carro) {
            echo "ID = " . $carro['ID'] . PHP_EOL;
            echo "COR = " . $carro['Cor'] . PHP_EOL;
            echo "MARCA = " . $carro['Marca'] . PHP_EOL;
            echo "MODELO = " . $carro['Modelo'] . PHP_EOL;
            echo "ANO = " . $carro['Ano'] . PHP_EOL;
            echo "PLACA = " . $carro['Placa'] . PHP_EOL;
            echo "PILOTO = " . $carro['Piloto'] . PHP_EOL;
            echo "POSICAO = " . $carro['Posicao'] . "º LUGAR" . PHP_EOL;
            echo PHP_EOL;
        }

    }
}