<?php
include("../conexion.php");

$preguntas = $_POST['preguntas'];
$respuesta = $_POST['respuesta'];
$pregunta = $_POST['pregunta'];
$activo = $_POST['activo'];

$data = array();

$sql = 'INSERT INTO refaccionaria_arboledas_web.tab_preguntas (id_pregunta, pregunta, respuesta, activo)
VALUES  (' . $preguntas . ', "' . $pregunta . '", "' . $respuesta . '", "' . $activo . '")
on duplicate key update 
pregunta = "' . $pregunta . '", 
respuesta = "' . $respuesta . '", 
activo = "' . $activo . '";';

$query = $con->prepare($sql);

if ($query->execute()) {
    $data['status'] = 'ok';
    if ($preguntas == 'null') {
        $data['msj'] = 'Se creó nueva pregunta';
    } else {
        $data['msj'] = 'Se actualizó una pregunta';
    }
} else {
    $data['status'] = 'error';
    $data['msj'] = 'No se guardaron los cambios: Error ' . $query->errorInfo();
}

echo json_encode($data);
