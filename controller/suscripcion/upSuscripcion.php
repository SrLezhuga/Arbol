<?php
include("../conexion.php");

$nombre = $_POST['nom'];
$telefono = $_POST['tel'];
$correo = $_POST['cor'];

$data = array();

$validate = "SELECT COUNT(*) AS Validacion FROM tab_suscripcion WHERE tel_subcripcion = '$telefono' OR email_subcripcion = '$correo'";
$queryValidate = $con->prepare($validate);
$queryValidate->execute();
$row = $queryValidate->fetch();

if ($row['Validacion'] == 0) {
    $sql = "INSERT INTO web_arbol.tab_suscripcion (nom_subcripcion, tel_subcripcion, email_subcripcion)
    values  ('" . $nombre . "', '" . $telefono . "', '" . $correo . "');";

    $query = $con->prepare($sql);

    if ($query->execute()) {
        $data['status'] = 'ok';
        $data['msj'] = 'Te suscribiste correctamente!';
    } else {
        $data['status'] = 'error';
        $data['msj'] = 'No se guardaron la suscripcion: Error ' . $query->errorInfo();
    }
} else {
    $data['status'] = 'error';
    $data['msj'] = 'No se guardaron la suscripcion: El Correo o el Teléfono ya esta registrado';
}

echo json_encode($data);
