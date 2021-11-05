<?php
include "../conexion.php";

$directorio = $_POST["Dir"];

$query = $con->prepare("SELECT * FROM tab_cedis WHERE id_cedis = $directorio");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$row = $query->fetch();


$data = array();
$data['status'] = 'ok';
$data['id_cedis'] = $row['id_cedis'];
$data['cedis'] = $row['cedis'];
$data['direccion_cedis'] = $row['direccion_cedis'];
$data['col_cedis'] = $row['col_cedis'];
$data['cp_cedis'] = $row['cp_cedis'];
$data['mun_cedis'] = $row['mun_cedis'];
$data['est_cedis'] = $row['est_cedis'];
$data['map_cedis'] = $row['map_cedis'];
$data['email_cedis'] = $row['email_cedis'];
$data['tel_info'] = $row['tel_info'];
$data['tel_ventas'] = $row['tel_ventas'];
$data['img_cedis'] = $row['img_cedis'];
$data['logo_cedis'] = $row['logo_cedis'];
$data['activo'] = $row['activo'];

echo json_encode($data);