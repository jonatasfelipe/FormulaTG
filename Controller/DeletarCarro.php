<?php

require_once 'Model/Helper.php';
require_once 'Model/DB.php';
require_once 'View/ImprimeListaCarros.php';
require_once 'ReorganizarPosicoes.php';

class DeletarCarro
{
    public function deletarCarroEscolhido()
    {
        ImprimeListaCarros::imprimeListaCarrosFormatada();

        echo PHP_EOL . PHP_EOL;

        echo "Escolha O ID Referente Ao Carro A Ser Deletado Na Lista Acima \n";

        $helper = new Helper();

        $id = $helper->getInputValue("Digite O ID Desejado!");

        $listaCarros = DB::obterListaCarros();

        foreach ($listaCarros as $carro) {
            if ($carro['ID'] == $id) {

                $indice = array_search($carro, $listaCarros);
            }
            unset($listaCarros[$indice]);
        }

        sort($listaCarros);

        DB::gravarListaCarros($listaCarros);

        (new ReorganizarPosicoes())->reorganizaPosicoesAposExclusao();

    }
}