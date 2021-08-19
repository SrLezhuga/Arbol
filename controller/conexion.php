<?php

$host     = "localhost";
$user     = "root";
$password = "";
$db       = "web_arbol";

try {
    $con = new PDO('mysql:host='.$host.';dbname='.$db.'', "$user", "$password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
     echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}



