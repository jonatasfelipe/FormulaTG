<?php

require_once 'Model/DB.php';
require_once 'Model/Helper.php';
require_once 'View/ListarMenu.php';
require_once 'Model/Validador.php';

class RealizarUltrapassagem
{

    public function fazerUltrapassagem()
    {
        $status = (new Validador())->validaStatusCorrida();
        if ($status == false) {
            echo "A corrida precisa estar iniciada\n";
            exit();
        } else {

            $historico = [];

            $listaCarros = DB::obterListaCarros();

            echo "\n";

            $helper = new Helper();

            $nomeQueVaiUltrapassar = strtoupper($helper->getInputValue("Digite o nome do Piloto Que Realizará A Ultrapassagem! \n"));
            $nomeQueSeraUltrapassado = strtoupper($helper->getInputValue("Digite o nome do Piloto Que Será Ultrapassado! \n"));

            $posicaoQueVaiUltrapassar = (new CarroController())->obtemPosicaoPeloNome($nomeQueVaiUltrapassar);
            $posicaoQueSeraUltrapassado = (new CarroController())->obtemPosicaoPeloNome($nomeQueSeraUltrapassado);

            if ($posicaoQueVaiUltrapassar < $posicaoQueSeraUltrapassado) {
                echo "Você não pode realizar essa ultrapassagem\n";
                echo "\n";

                (new ListarMenu())->listarMenuGeral();
            }

            if ($posicaoQueVaiUltrapassar - $posicaoQueSeraUltrapassado != 1) {
                echo "Você só pode ultrapassar um carro por vez! \n";
                (new RealizarUltrapassagem())->fazerUltrapassagem();
            }

            foreach ($listaCarros as $carroUltr) {
                if ($carroUltr['Piloto'] == $nomeQueSeraUltrapassado) {
                    $indice = array_search($carroUltr, $listaCarros);

                    $listaCarros[$indice]['Posicao'] = ++$carroUltr['Posicao'];
                }
            }

            foreach ($listaCarros as $carro) {
                if ($carro['Piloto'] == $nomeQueVaiUltrapassar) {
                    $indice1 = array_search($carro, $listaCarros);

                    $listaCarros[$indice1]['Posicao'] = --$carro['Posicao'];
                }
            }

            usort($listaCarros, function ($a, $b) {
                return $a['Posicao'] < $b['Posicao'] ? -1 : 1;
            });


            $historico = DB::obterHistoricoCorrida();
            $historico[] = "O Piloto $nomeQueVaiUltrapassar ultrapassou o Piloto $nomeQueSeraUltrapassado \n";

            DB::guardaHistoricoCorrida($historico);
            DB::gravarListaCarros($listaCarros);
            exit();

        }
    }
}