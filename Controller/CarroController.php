<?php

require_once 'Model/DB.php';

class CarroController
{
    public function definirPosicaoInicial(): int
    {
        $listaCarros = DB::obterListaCarros();

        $ultimaPosicao = count($listaCarros);
        return $ultimaPosicao + 1;
    }

    public function definirId(): int
    {
        $listaCarros = DB::obterListaCarros();

        $ultimoId = count($listaCarros);
        return $ultimoId + 1;
    }

    public function gravarNovoCarro(
        int $id,
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
            'ID' => $id,
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