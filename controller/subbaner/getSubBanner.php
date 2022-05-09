<?php
include "../conexion.php";

$slider = $_POST["Sli"];

$query = $con->prepare("SELECT * FROM tab_subslider WHERE id_subslider = $slider");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$row = $query->fetch();


$data = array();
$data['status'] = 'ok';
$data['id_subslider'] = $row['id_subslider'];
$data['img'] = $row['img'];
$data['active'] = $row['active'];

echo json_encode($data);