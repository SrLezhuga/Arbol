<?php

$serverName = "192.168.0.41\SQLEXPRESS, 1433"; 
$connectionInfo = array("Database"=>"db.Capital_Humano", "UID"=>"sa", "PWD"=>"M4n4g3r!89", "CharacterSet" => "UTF-8" );
$conn = sqlsrv_connect($serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die(print_r(sqlsrv_errors(), true));
}
