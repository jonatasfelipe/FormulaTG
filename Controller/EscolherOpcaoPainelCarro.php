<?php
require_once 'CadastrarCarro.php';
require_once 'View/ListarMenu.php';
require_once 'Model/Helper.php';
require_once 'Model/DB.php';
require_once 'EditarCarro.php';
require_once 'DeletarCarro.php';

class EscolherOpcaoPainelCarro
{
    public function opcaoPainelCarro()
    {
        $helper = new Helper();
        $opcaoEscolhidaPainelCarro = $helper->getInputValue("Escolha a opção desejada! \n");

        switch ($opcaoEscolhidaPainelCarro) {

            case 0:
                echo "\n";
                (new CadastrarCarro())->cadastroNovoCarro();
                break;

            case 1:
                echo "\n";
                (new EditarCarro())->atualizarInformacoesCarro();
                break;

            case 2:
                echo "\n";
                (new DeletarCarro())->deletarCarroEscolhido();
                break;

            case 3:
                echo "\n";
                ImprimeListaCarros::imprimeListaCarrosFormatada();
                break;

            case 4:
                echo "Opção Inválida \n";
                (new ListarMenu())->listarPainelCarro();
                break;
        }
    }
}