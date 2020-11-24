<?php
require_once 'Model/Helper.php';
require_once 'EscolherOpcaoPainelCarro.php';
require_once 'Model/DB.php';
require_once 'RealizarUltrapassagem.php';
require_once 'Corrida.php';

class EscolherOpcaoMenu
{

    public function opcaoMenu()
    {

        $helper = new Helper();
        $opcaoEscolhidaMenu = $helper->getInputValue("Escolha a opção desejada! \n");

        switch ($opcaoEscolhidaMenu) {

            case 0:
                echo "\n";
                (new ListarMenu())->listarPainelCarro();
                break;

            case 1:
                echo "\n";
                (new ListarMenu())->listarPainelCorrida();
                break;

            default:
                echo "\033[2J\033[1;1H"; //limpa tela
                echo "Opção Inválida \n";
                (new ListarMenu())->listarMenuGeral();
                break;

        }

    }
}