<?php
include "../conexion.php";

$Pregunta = $_POST["Pre"];

$query = $con->prepare("SELECT * FROM tab_preguntas WHERE id_pregunta = $Pregunta");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$row = $query->fetch();


$data = array();
$data['status'] = 'ok';
$data['id_pregunta'] = $row['id_pregunta'];
$data['pregunta'] = $row['pregunta'];
$data['respuesta'] = $row['respuesta'];
$data['active'] = $row['activo'];

echo json_encode($data);