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
                echo "\033[2J\033[1;1H"; //limpa tela
                (new CadastrarCarro())->cadastroNovoCarro();
                break;

            case 1:
                echo "\033[2J\033[1;1H"; //limpa tela
                (new EditarCarro())->atualizarInformacoesCarro();
                break;

            case 2:
                echo "\033[2J\033[1;1H"; //limpa tela
                (new DeletarCarro())->deletarCarroEscolhido();
                break;

            case 3:
                echo "\033[2J\033[1;1H"; //limpa tela
                ImprimeListaCarros::imprimeListaCarrosFormatada();
                break;

            case 4:
                echo "\033[2J\033[1;1H"; //limpa tela
                (new ListarMenu())->listarMenuGeral();
                break;

            default:
                echo "Opção Inválida";
                (new ListarMenu())->listarPainelCarro();
                break;
        }
    }
}