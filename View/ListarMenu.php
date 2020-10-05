<?php

require_once 'Controller/EscolherOpcaoMenu.php';
require_once 'Controller/EscolherOpcaoPainelCarro.php';

class ListarMenu
{

    function listarMenuGeral()
    {

        $numeroOpcao = [0 => "Painel Dos Carros", 1 => "Iniciar Corrida", 2 => "Realizar Ultrapassagem", 3 => "Finalizar Corrida", 4 => "Histórico de Ultrapassagem"];

        foreach ($numeroOpcao as $chave => $valor) {

            echo "$chave : $valor.\n";

        }
        echo PHP_EOL;
        (new EscolherOpcaoMenu())->opcaoMenu();
        exit();
    }

    function listarPainelCarro()
    {
        $numeroOpcaoPainel = [0 => "Cadastrar Novo Carro. ", 1 => "Editar Carro Existente. ", 2 => "Remover Carro Cadastrado. ", 3 => "Listar Todos os Carros Cadastrados. "];

        foreach ($numeroOpcaoPainel as $chave => $valor) {

            echo "$chave : $valor.\n";

        }
        echo PHP_EOL;
        (new EscolherOpcaoPainelCarro())->opcaoPainelCarro();
        exit();
    }
}