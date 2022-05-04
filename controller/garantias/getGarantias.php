<?php
include "../conexion.php";

$garantias = $_POST["Gar"];

$query = $con->prepare("SELECT * FROM tab_garantias WHERE id_garantia = $garantias");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$row = $query->fetch();


$data = array();
$data['status'] = 'ok';
$data['id_garantia'] = $row['id_garantia'];
$data['marca_garantia'] = $row['marca_garantia'];
$data['nombre_pdf'] = $row['nombre_pdf'];
$data['archivo'] = $row['archivo'];
$data['active'] = $row['active'];

echo json_encode($data);