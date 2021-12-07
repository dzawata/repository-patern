<?php

function getConnection(): PDO
{
    $host="127.0.0.1";
    $port=3306;
    $database="belajar_php";
    $username="root";
    $password="";

    return new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
}