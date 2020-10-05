<?php


class Helper
{

    public function getInputValue(string $message)
    {
        echo $message;

        $handle = fopen("php://stdin", "r");

        return str_replace("\n","", fgets($handle));
    }
}