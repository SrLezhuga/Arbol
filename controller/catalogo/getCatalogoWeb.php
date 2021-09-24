<?php
include "../conexion.php";

$catalogo = $_POST["Cat"];

$query = $con->prepare("SELECT * FROM tab_catalogo_web WHERE id_catalogo_web = $catalogo");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$row = $query->fetch();


$data = array();
$data['status'] = 'ok';
$data['id_catalogo_web'] = $row['id_catalogo_web'];
$data['nombre_catalogo_web'] = $row['nombre_catalogo_web'];
$data['img_catalogo_web'] = $row['img_catalogo_web'];
$data['info_catalogo_web'] = $row['info_catalogo_web'];
$data['url_catalogo_web'] = $row['url_catalogo_web'];
$data['active'] = $row['active'];

echo json_encode($data);