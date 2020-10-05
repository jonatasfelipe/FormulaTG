<?php

require_once 'Model/DB.php';

class ReorganizarPosicoes
{
    public function reorganizaPosicoesAposExclusao()
    {
        $indice = 0;
        $listaCarros = DB::obterListaCarros();

        foreach ($listaCarros as $posicao) {
            if ($posicao['Posicao'] == ($indice + 1)) {
                $indice = $indice+1;
            } else {

                unset($listaCarros[$indice]);

                $listaCarros[$indice] = [
                    'ID' => $posicao['ID'],
                    'Cor' => strtoupper($posicao['Cor']),
                    'Marca' => strtoupper($posicao['Marca']),
                    'Modelo' => strtoupper($posicao['Modelo']),
                    'Ano' => $posicao['Ano'],
                    'Placa' => strtoupper($posicao['Placa']),
                    'Piloto' => strtoupper($posicao['Piloto']),
                    'Posicao' => $indice+1
                ];
                DB::gravarListaCarros($listaCarros);
            $indice = $indice+1;

            }
        }
    }
}