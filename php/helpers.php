<?php

function varDumpWithBr($data): void
{
    var_dump($data);
    echo "<br>";
}

function echoWithBr($data): void
{
    echo $data;
    echo "<br>";
}

function printRWithBr($data): void
{
    print_r($data);
    echo "<br>";
}

function echoHr(): void
{
    echo "<hr>";
}