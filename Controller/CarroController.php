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

        $Id = 0;

        foreach ($listaCarros as $ultimoId)
        {
            if ($ultimoId['ID'] > $Id){
                $Id = $ultimoId['ID'];
            }
        }

        return $Id + 1;

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

    public function obtemPosicaoPeloNome(string $nomePiloto): int
    {
        $listaCarros = DB::obterListaCarros();

        foreach ($listaCarros as $carro)
        {
            if ($nomePiloto == $carro['Piloto']){
                return $carro['Posicao'];
            }
        }

        echo "O Piloto $nomePiloto não foi encontrado!";
    }

}