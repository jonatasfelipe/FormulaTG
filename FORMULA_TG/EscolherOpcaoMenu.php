<?php

include 'CadastrarCarro.php';

class EscolherOpcaoMenu
{

    public function opcaoMenu()
    {

        $opcaoEscolhidaMenu = readline("Escolha a opção desejada: \n");

        switch ($opcaoEscolhidaMenu) {

            case 0:
                echo "\n";
                (new CadastrarCarro())->cadastroNovoCarro();
                break;

            case 1:
                echo "\n";
                break;

            case 2:
                echo "Iniciar Corrida";
                break;

            case 3:
                echo "Realizar Ultrapassagem";
                break;

            case 4:
                echo "Finalizar Corrida";
                break;

            case 5:
                echo "Histórico de Ultrapassagem";
                break;

            case 6:
                echo "Opção Inválida \n";
                (new EscolherOpcaoMenu())->opcaoMenu();
                break;
        }
    }
}