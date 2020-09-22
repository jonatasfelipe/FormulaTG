<?php
require_once 'Helper.php';
require_once 'CadastrarCarro.php';

class EscolherOpcaoMenu
{

    public function opcaoMenu()
    {

        $helper = new Helper();
        $opcaoEscolhidaMenu = $helper->getInputValue("Escolha a opção desejada! \n");

        switch ($opcaoEscolhidaMenu) {

            case 0:
                echo "\n";
                (new CadastrarCarro())->cadastroNovoCarro();
                break;

            case 1:
                echo "Iniciar Corrida";
                break;

            case 2:
                echo "Realizar Ultrapassagem";
                break;

            case 3:
                echo "Finalizar Corrida";
                break;

            case 4:
                echo "Histórico de Ultrapassagem";
                break;

            case 5:
                echo "Opção Inválida \n";
                (new EscolherOpcaoMenu())->opcaoMenu();
                break;
        }
    }
}