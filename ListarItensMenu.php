<?php

class ListarItensMenu
{

    function listarMenu()
    {

        $numeroOpcao = [0 => "Painel Dos Carros", 1 => "Iniciar Corrida", 2 => "Realizar Ultrapassagem", 3 => "Finalizar Corrida", 4 => "Histórico de Ultrapassagem"];

        foreach ($numeroOpcao as $chave => $valor) {

            echo "$chave : $valor.\n";

        }
        echo PHP_EOL;
    }
}