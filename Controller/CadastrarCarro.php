<?php
require_once 'CarroController.php';
require_once 'Model/Validador.php';

class CadastrarCarro
{
    public function cadastroNovoCarro(): void
    {
        echo "BEM VINDO AO CADASTRO DE UM NOVO CARRO! \n\n";

        echo "POR FAVOR RESPONDA AS PERGUNTAS ABAIXO: \n\n";

        $classeValidaPiloto = new Validador();
        $helper = new Helper();
        $carroController = new CarroController();

        $cor = $helper->getInputValue("Qual a Cor do Carro? ");
        $marca = $helper->getInputValue("Qual a Marca do Carro? : ");
        $modelo = $helper->getInputValue("Qual o Modelo do Carro: ");
        $ano = $helper->getInputValue("Qual o Ano do Carro: ");
        $placa = $helper->getInputValue("Digite a Placa sem hífens: ");

        $piloto = $helper->getInputValue("Digite o Nome do Piloto:");
        $classeValidaPiloto->validaPilotoExistente($piloto);

        $posicao = $carroController->definirPosicaoInicial();

        $id = $carroController->definirId();

        $classeValidaPiloto->validarCamposVazios($cor, $marca, $modelo, $ano, $placa);

        $carroController->gravarNovoCarro($id, $cor, $marca, $modelo, $ano, $placa,$piloto,$posicao);

        echo "Carro Cadastrado Com Sucesso! \n";
    }
}