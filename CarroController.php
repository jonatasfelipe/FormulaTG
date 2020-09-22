<?php

require_once 'DB.php';

class CarroController
{
    public function definirPosicaoInicial(): int
    {
        $listaCarros = DB::obterListaCarros();

        $ultimaPosicao = count($listaCarros);
        return $ultimaPosicao + 1;
    }

    public function gravarNovoCarro(
        string $cor,
        string $marca,
        string $modelo,
        int $ano,
        string $placa,
        string $piloto,
        int $posicao
    ): void
    {
        $listaCarros = DB::obterListaCarros();

        $listaCarros[] = [
            'Cor' => strtoupper($cor),
            'Marca' => strtoupper($marca),
            'Modelo' => strtoupper($modelo),
            'Ano' => $ano,
            'Placa' => strtoupper($placa),
            'Piloto' => strtoupper($piloto),
            'Posicao' => $posicao
        ];

        DB::gravarListaCarros($listaCarros);
    }
}