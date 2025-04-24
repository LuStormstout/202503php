<?php

function varDumpWithBr($data): void
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    echo "<br>";
}

function echoWithBr($data): void
{
    echo $data;
    echo "<br>";
}

function printRWithBr($data): void
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    echo "<br>";
}

function echoHr(): void
{
    echo "<hr>";
}