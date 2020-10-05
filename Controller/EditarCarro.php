<?php

require_once 'Model/DB.php';
require_once 'Model/Helper.php';
require_once 'CarroController.php';

class EditarCarro
{
    public function atualizarInformacoesCarro()
    {
        DB::imprimeListaCarrosFormatada();

        echo PHP_EOL . PHP_EOL;

        echo "Escolha O ID Referente Ao Carro Desejado Na Lista Acima \n";

        $helper = new Helper();
        $carroController = new CarroController();

        $id = $helper->getInputValue("Digite O ID Desejado!");

        $listaCarros = DB::obterListaCarros();

        foreach ($listaCarros as $carro) {
            if ($carro['ID'] == $id) {

                $indice = array_search($carro, $listaCarros);

                echo "ID = " . $carro['ID'] . PHP_EOL;

                echo "COR ATUAL = " . $carro['Cor'] . PHP_EOL;
                $cor = strtoupper($helper->getInputValue("DIGITE AS ALTERACOES OU PRESSIONE ENTER PARA PULAR \n"));
                if ($cor == null) {
                    $cor = $carro['Cor'];
                }

                echo "MARCA ATUAL = " . $carro['Marca'] . PHP_EOL;
                $marca = strtoupper($helper->getInputValue("DIGITE AS ALTERACOES OU PRESSIONE ENTER PARA PULAR \n"));
                if ($marca == null) {
                    $marca = $carro['Marca'];
                }

                echo "MODELO ATUAL = " . $carro['Modelo'] . PHP_EOL;
                $modelo = strtoupper($helper->getInputValue("DIGITE AS ALTERACOES OU PRESSIONE ENTER PARA PULAR \n"));
                if ($modelo == null) {
                    $modelo = $carro['Modelo'];
                }

                echo "ANO ATUAL = " . $carro['Ano'] . PHP_EOL;
                $ano = strtoupper($helper->getInputValue("DIGITE AS ALTERACOES OU PRESSIONE ENTER PARA PULAR \n"));
                if ($ano == null) {
                    $ano = $carro['Ano'];
                }

                echo "PLACA ATUAL = " . $carro['Placa'] . PHP_EOL;
                $placa = strtoupper($helper->getInputValue("DIGITE AS ALTERACOES OU PRESSIONE ENTER PARA PULAR \n"));
                if ($placa == null) {
                    $placa = $carro['Placa'];
                }

                echo "PILOTO ATUAL = " . $carro['Piloto'] . PHP_EOL;
                $piloto = strtoupper($helper->getInputValue("DIGITE AS ALTERACOES OU PRESSIONE ENTER PARA PULAR \n"));
                if ($piloto == null) {
                    $piloto = $carro['Piloto'];
                }

                echo "POSICAO = " . $carro['Posicao'] . "º LUGAR" . PHP_EOL;

                echo PHP_EOL;

                unset($listaCarros[$indice]);

                $listaCarros[$indice] = [
                    'ID' => $id,
                    'Cor' => strtoupper($cor),
                    'Marca' => strtoupper($marca),
                    'Modelo' => strtoupper($modelo),
                    'Ano' => $ano,
                    'Placa' => strtoupper($placa),
                    'Piloto' => strtoupper($piloto),
                    'Posicao' => $carro['Posicao']

                ];

                sort($listaCarros);

                DB::gravarListaCarros($listaCarros);


            }
        }
    }
}