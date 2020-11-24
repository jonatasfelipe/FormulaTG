<?php

require_once 'RealizarUltrapassagem.php';
require_once 'View/ImprimeHistoricoCorrida.php';
require_once 'FinalizarCorrida.php';
require_once 'Corrida.php';

class EscolherOpcaoCorrida
{
    public function opcaoPainelCorrida()
    {
        $helper = new Helper();
        $opcaoEscolhidaCorrida = $helper->getInputValue("Escolha a opção desejada! \n");

        switch ($opcaoEscolhidaCorrida) {

            case 0:
                echo "\033[2J\033[1;1H"; //limpa tela
                (new Corrida())->IniciarCorrida();
                break;

            case 1:
                echo "\033[2J\033[1;1H"; //limpa tela
                (new RealizarUltrapassagem())->fazerUltrapassagem();
                break;

            case 2:
                echo "\n";
                (new FinalizarCorrida())->encerrarCorrida();
                break;

            case 3:
                echo "\033[2J\033[1;1H"; //limpa tela
                (new ImprimeHistoricoCorrida())->listaHistoricoCorrida();
                break;

            case 4:
                echo "\033[2J\033[1;1H"; //limpa tela
                (new ListarMenu())->listarMenuGeral();
                break;

            default:
                echo "\033[2J\033[1;1H"; //limpa tela
                (new ListarMenu())->listarPainelCorrida();
                break;
        }

    }
}