<?php
require_once 'Model/Validador.php';

class FinalizarCorrida
{
    public function encerrarCorrida()
    {
        $status = DB::obterStatusCorrida();

        foreach ($status as $statusAtual) {
            echo "Finalizando Sua Corrida \n";
            $statusAtual = [
                'Status' => false
            ];
            DB::gravarStatusCorrida($statusAtual);

            $listaCarros = DB::obterListaCarros();

            $historico = DB::obterHistoricoCorrida();

            foreach ($listaCarros as $carro) {

            if ($carro['Posicao'] < 4){
                $historico[] = $carro['Posicao'] . "* Lugar - " . $carro['Piloto'];
            }
            }
            DB::guardaHistoricoCorrida($historico);
        }

        (new ImprimeHistoricoCorrida())->listaHistoricoCorrida();

        exit();
    }
}
