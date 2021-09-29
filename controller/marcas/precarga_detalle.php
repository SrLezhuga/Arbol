<?php
include "../conexion.php";

$Rs = $_POST['Rs'];




$query = $con->prepare("SELECT * FROM tab_marcas WHERE nombre_marca = '$Rs' ");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$numeroDeFilas = $query->rowCount();

$data = array();

if (!$numeroDeFilas <= 0) {
  $row = $query->fetch();

  $data['status'] = 'ok';
  $data['nombre_marca'] = $row['nombre_marca'];
  $data['img_marca'] = $row['img_marca'];
  $data['info_marca'] = $row['info_marca'];
} else {
  $data['status'] = 'Error';
}







echo json_encode($data);
