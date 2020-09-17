<?php

require_once 'CadastrarCarro.php';

class Validador
{
    /*-----------------FUNÇÃO VALIDA SE O PILOTO JA ESTA CADASTRADO EM OUTRO CARRO--------------------*/
    public function validarPiloto(string $piloto): void
    {
        $listaPilotos = self::obterListaCarros();

        foreach ($listaPilotos as $pilotoRes) {

            if ($pilotoRes['Piloto'] == $piloto) {
                echo "Piloto ja Cadastrado, Realize Novamente o Cadastro com Outro Piloto!\n";
                (new CadastrarCarro())->cadastroNovoCarro();
                exit();
            }
        }
    }

    /*-----------------FUNÇÃO VALIDA SE A POSIÇÃO NÃO É 0 OU SE JA NÃO ESTA OCUPADA-------------------*/
    public function validarPosicao(string $posicao): void
    {
        $listaPilotos = self::obterListaCarros();

        if ($posicao == 0) {
            echo "O valor da posição tem que ser maior que 0 ! \n";
            (new CadastrarCarro())->cadastroNovoCarro();
            exit();
        }

        foreach ($listaPilotos as $pilotoRes) {

            if ($pilotoRes['Posicao'] == $posicao) {
                echo "Opa posição já ocupada!\n";
                (new CadastrarCarro())->cadastroNovoCarro();
                exit();
            }
        }
    }

    /*------FUNÇÃO VALIDA SE OS CAMPOS FORAM TODOS PREENCHIDOS E COM O TIPO DE VALOR CORRETO----------*/
    public function validarCamposVazios(string $cor, string $marca, string $modelo, int $ano, string $placa, string $piloto, int $posicao)
    {

        $listaPilotos = self::obterListaCarros();

        if (!empty($cor) && !empty($marca) && !empty($modelo) && !empty($ano) && !empty($placa) && !empty($piloto)) {
            $listaPilotos[] = ['Cor' => strtoupper($cor), 'Marca' => strtoupper($marca), 'Modelo' => strtoupper($modelo), 'Ano' => $ano, 'Placa' => strtoupper($placa), 'Piloto' => strtoupper($piloto), 'Posicao' => $posicao];

            // Tranforma o array $dados_identificador em JSON
            $carrosCadastrados = json_encode($listaPilotos, JSON_PRETTY_PRINT);

            $caminho = __DIR__ . '\Carros.json';

            file_put_contents($caminho, $carrosCadastrados);

        } else {
            echo "ERRO! - Por Favor Preencha Todos os Campos! \n\n";
            (new ListarItensMenu())->listarMenu();
        }
    }

    /*-----------------------FUNÇÃO OBTÊM LISTA DE CARROS EM FORMA DE ARRAY--------------------------*/
    public static function obterListaCarros(): array
    {
        return json_decode(file_get_contents('C:\Users\jonat\Desktop\FILE\PROJETOS\FORMULA_TG\Carros.json'), true);
    }

}
