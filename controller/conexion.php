<?php

$host     = "mysql.server268.com:3308";
$user     = "administrator";
$password = "Arbol.2022";
$db       = "refaccionaria_arboledas_web";

try {
    $con = new PDO('mysql:host='.$host.';dbname='.$db.'', "$user", "$password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
     echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}



