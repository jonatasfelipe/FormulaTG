<?php

require_once 'View/ListarMenu.php';
require_once 'Controller/EscolherOpcaoMenu.php';

echo "Seja Bem Vindo A Formula TG! \n\n";

(new ListarMenu())->listarMenuGeral();
