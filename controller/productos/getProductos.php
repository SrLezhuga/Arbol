<?php
include "../conexion.php";

$producto = $_POST["Pro"];

$query = $con->prepare("SELECT * FROM tab_sistemas WHERE id_sistema = $producto ");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$row = $query->fetch();


$data = array();
$data['status'] = 'ok';
$data['id_sistema'] = $row['id_sistema'];
$data['sistema'] = $row['sistema'];
$data['marca'] = $row['marca'];
$data['img_item'] = $row['img_item'];
$data['descripcion_item'] = $row['descripcion_item'];
$data['active'] = $row['activo'];

echo json_encode($data);