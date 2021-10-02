<?php
include "../conexion.php";

$marcas = $_POST["Mar"];

$query = $con->prepare("SELECT * FROM tab_marcas WHERE id_marca = $marcas");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$row = $query->fetch();


$data = array();
$data['status'] = 'ok';
$data['id_marcas'] = $row['id_marca'];
$data['nombre_marcas'] = $row['nombre_marca'];
$data['img_marcas'] = $row['img_marca'];
$data['info_marcas'] = $row['info_marca'];
$data['active'] = $row['active'];

echo json_encode($data);