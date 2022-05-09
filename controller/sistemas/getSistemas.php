<?php
include "../conexion.php";

$sistema = $_POST["Sis"];

$query = $con->prepare("SELECT * FROM tab_lineas WHERE id_linea = '$sistema'");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$row = $query->fetch();


$data = array();
$data['status'] = 'ok';
$data['id_linea'] = $row['id_linea'];
$data['img_linea'] = $row['img_linea'];
$data['nombre_linea'] = $row['nombre_linea'];
$data['info_linea'] = $row['info_linea'];
$data['active'] = $row['active'];

echo json_encode($data);