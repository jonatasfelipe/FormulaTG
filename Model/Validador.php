<?php

require_once 'Controller/CadastrarCarro.php';
require_once 'DB.php';

class Validador
{
    public function validaPilotoExistente(string $piloto): void
    {
        $listaPilotos = DB::obterListaCarros();

        foreach ($listaPilotos as $pilotoRes) {

            if ($pilotoRes['Piloto'] == $piloto) {
                echo "Piloto ja Cadastrado, Realize Novamente o Cadastro com Outro Piloto!\n";
                (new CadastrarCarro())->cadastroNovoCarro();
                exit();
            }
        }
    }

    public function validarCamposVazios($cor, string $marca, string $modelo, int $ano, string $placa): void
    {
        if (empty($cor) || empty($marca) || empty($modelo) || empty($ano) || empty($placa)) {
            echo "ERRO! - Por Favor Preencha Todos os Campos! \n\n";
            (new ListarMenu())->listarMenuGeral();
            exit();
        }
    }

    public function validaStatusCorrida()
    {
        $status = DB::obterStatusCorrida();

        foreach ($status as $statusAtual) {
            if ($statusAtual == true) {
                return true;
            } else {
                return false;
            }
        }
    }
}