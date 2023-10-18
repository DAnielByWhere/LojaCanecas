<?php

$servidor = "localhost";
$usuario = "root";
$senha = "GingerWithTea281";
$banco = "db_ead";

$cn = new PDO("mysql:host=$servidor; dbname=$banco;", $usuario, $senha);

?>