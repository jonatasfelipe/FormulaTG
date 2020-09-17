<?php

class ListarItensMenu
{

    function listarMenu()
    {

        $numeroOpcao = [0 => "Cadastrar Carro", 1 => "Cadastrar Piloto", 2 => "Iniciar Corrida", 3 => "Realizar Ultrapassagem", 4 => "Finalizar Corrida", 5 => "Histórico de Ultrapassagem"];

        foreach ($numeroOpcao as $chave => $valor) {

            echo "$chave : $valor.\n";

        }
        echo PHP_EOL;
    }
}