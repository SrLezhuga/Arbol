<?php
include "../conexion.php";

$Pregunta = $_POST["Pre"];

$query = $con->prepare("SELECT * FROM tab_nosotros WHERE campo = '$Pregunta'");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$row = $query->fetch();


$data = array();
$data['status'] = 'ok';
$data['campo'] = $row['campo'];
$data['valor'] = $row['valor'];
$data['active'] = $row['activo'];

echo json_encode($data);