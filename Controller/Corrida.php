<?php

require_once 'Model/DB.php';
require_once 'Model/Validador.php';
require_once 'View/ListarMenu.php';

class Corrida
{

    public function IniciarCorrida()
    {
        $status = (new Validador())->validaStatusCorrida();
        if ($status == true)
        {
            echo "A corrida já esta iniciada\n";
            exit();
        } else{
            echo "Iniciando Sua Corrida \n";

            $statusAtual[] = [
                'Status' => true
            ];

            DB::gravarStatusCorrida($statusAtual);

            $historico[] = "Acompanhe abaixo o Historico da corrida!";

            DB::guardaHistoricoCorrida($historico);

            (new Corrida())->posicaoDosCarrosParaIniciar();
            exit();
        }
    }

    public function posicaoDosCarrosParaIniciar()
    {
        echo "\033[2J\033[1;1H"; //limpa tela
        sleep(2);

        echo "A Corrida começa em: \n" . sleep(2);
        echo "3... \n" . sleep(2);
        echo "2...  \n" . sleep(2);
        echo "1... \n" . sleep(2);
        echo "...\n" . sleep(2);

        ImprimeListaCarros::imprimeListaCarrosFormatada();

        (new ListarMenu())->listarPainelCorrida();
    }
}