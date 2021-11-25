<?php
include "../conexion.php";

$aviso = $_POST["Avi"];

$query = $con->prepare("SELECT * FROM tab_promo WHERE id_promo = $aviso");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$row = $query->fetch();

$data = array();
$data['status'] = 'ok';
$data['id_promo'] = $row['id_promo'];
$data['img_promo'] = $row['img_promo'];
$data['url_promo'] = $row['url_promo'];
$data['active'] = $row['active'];

echo json_encode($data);