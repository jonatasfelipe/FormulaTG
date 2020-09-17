<?php

require_once 'Validador.php';

class CadastrarCarro
{

    public function cadastroNovoCarro()
    {

        echo "BEM VINDO AO CADASTRO DE UM NOVO CARRO! \n\n";
        echo "POR FAVOR RESPONDA AS PERGUNTAS ABAIXO: \n\n";

        $listaCarros = json_decode(file_get_contents('C:\Users\jonat\Desktop\FILE\PROJETOS\FORMULA_TG\Carros.json'), true);
        $classeValidaPiloto = new Validador();

        $cor = readline("Qual a Cor do Carro? \n");
        $marca = readline("Qual a Marca do Carro? : \n");
        $modelo = readline("Qual o Modelo do Carro: \n");
        $ano = readline("Qual o Ano do Carro: \n");
        $placa = readline("Digite a Placa sem hífens: \n");

        $piloto = null;
        $piloto = strtoupper(readline("Digite o Nome do Piloto: \n"));
        $classeValidaPiloto->validarPiloto($piloto);

        $posicao = null;
        $posicao = readline("Digite a Posição: \n ");
        $classeValidaPiloto->validarPosicao($posicao);

        (new Validador())->validarCamposVazios($cor, $marca, $modelo, $ano, $placa, $piloto, $posicao);


    }
}