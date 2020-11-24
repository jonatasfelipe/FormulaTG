<?php

require_once 'View/Bandeira.php';
require_once 'View/ListarMenu.php';
require_once 'Controller/EscolherOpcaoMenu.php';

echo "\033[2J\033[1;1H"; //limpa tela

echo "\n Seja Bem Vindo A \n";

Bandeira::imprimeBandeira();

sleep(3);

echo "\033[2J\033[1;1H"; //limpa tela

(new ListarMenu())->listarMenuGeral();
