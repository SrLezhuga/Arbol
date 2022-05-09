<?php
include "../conexion.php";

$slider = $_POST["Sli"];

$query = $con->prepare("SELECT * FROM tab_slider WHERE id_slider = $slider");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$row = $query->fetch();


$data = array();
$data['status'] = 'ok';
$data['id_slider'] = $row['id_slider'];
$data['img_pc'] = $row['img_pc'];
$data['img_movil'] = $row['img_movil'];
$data['active'] = $row['active'];

echo json_encode($data);