<?php

require_once 'Controller/EscolherOpcaoMenu.php';
require_once 'Controller/EscolherOpcaoPainelCarro.php';
require_once 'Controller/EscolherOpcaoCorrida.php';

class ListarMenu
{

    function listarMenuGeral()
    {
        echo "MENU GERAL";
        echo PHP_EOL . PHP_EOL;

        $numeroOpcao = [
            0 => "Painel Dos Carros",
            1 => "Painel Corrida"
        ];

        foreach ($numeroOpcao as $chave => $valor) {
            echo "$chave -> $valor";
            echo PHP_EOL;
        }

        echo PHP_EOL;

        (new EscolherOpcaoMenu())->opcaoMenu();

        exit();
    }

    function listarPainelCarro()
    {
        echo "\033[2J\033[1;1H"; //limpa tela
        echo "MENU CARROS";
        echo PHP_EOL . PHP_EOL;

        $numeroOpcaoPainel = [
            0 => "Cadastrar Novo Carro. ",
            1 => "Editar Carro Existente. ",
            2 => "Remover Carro Cadastrado. ",
            3 => "Listar Todos os Carros Cadastrados. ",
            4 => "Retornar ao Menu Geral"
        ];

        foreach ($numeroOpcaoPainel as $chave => $valor) {
            echo "$chave -> $valor";
            echo PHP_EOL;
        }

        echo PHP_EOL;

        (new EscolherOpcaoPainelCarro())->opcaoPainelCarro();

        exit();
    }

    function listarPainelCorrida()
    {
        echo "\033[2J\033[1;1H"; //limpa tela
        echo "MENU CORRIDA";
        echo PHP_EOL . PHP_EOL;

        $numeroOpcaoCorrida = [
            0 => "Iniciar Corrida ",
            1 => "Realizar Ultrapassagem ",
            2 => "Finalizar Corrida ",
            3 => "Histórico de Ultrapassagem ",
            4 => "Retornar ao Menu Geral"
        ];

        foreach ($numeroOpcaoCorrida as $chave => $valor) {

            echo "$chave -> $valor";
            echo PHP_EOL;

        }
        echo PHP_EOL;

        (new EscolherOpcaoCorrida())->opcaoPainelCorrida();

        exit();
    }
}