<?php

require_once 'ListarItensMenu.php';
require_once 'EscolherOpcaoMenu.php';

echo "Seja Bem Vindo A Corrida! \n\n";

(new ListarItensMenu())->listarMenu();

(new EscolherOpcaoMenu())->opcaoMenu();
