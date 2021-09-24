<?php
include "../conexion.php";

$catalogo = $_POST["Cat"];

$query = $con->prepare("SELECT * FROM tab_catalogo WHERE id_catalogo = $catalogo");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$row = $query->fetch();


$data = array();
$data['status'] = 'ok';
$data['id_catalogo'] = $row['id_catalogo'];
$data['marca_catalogo'] = $row['marca_catalogo'];
$data['titulo_catalogo'] = $row['titulo_catalogo'];
$data['subtitulo_catalogo'] = $row['subtitulo_catalogo'];
$data['fecha_catalogo'] = $row['fecha_catalogo'];
$data['img_catalogo'] = $row['img_catalogo'];
$data['archivo_catalogo'] = $row['archivo_catalogo'];
$data['activo'] = $row['activo'];
$data['etiquetas'] = $row['etiquetas'];

echo json_encode($data);