<?php

$contraseña = "M4n4g3r!89";
$usuario = "sa";
$nombreBaseDeDatos = "Capital_Humano";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "192.168.0.41";
try {
     $base_de_datos = new PDO("sqlsrv:server=$rutaServidor;database=$nombreBaseDeDatos", $usuario, $contraseña);
     $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
     echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}
