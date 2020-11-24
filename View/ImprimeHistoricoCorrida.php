<?php
require_once 'View/ListarMenu.php';

class ImprimeHistoricoCorrida
{
    public function listaHistoricoCorrida()
    {
    $historico = DB::obterHistoricoCorrida();

    foreach ($historico as $ultrapassagens)
    {
        echo "$ultrapassagens \n";
    }
    exit();
    }
}