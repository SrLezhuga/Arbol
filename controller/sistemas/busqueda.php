<?php
include "../conexion.php";

$retVal = (!empty($_POST['Rs'])) ? $parametro = $_POST['Rs'] : $parametro = '';

$query = $con->prepare("CALL BuscarSistema('%" . $parametro . "%')");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();

$rows = $query->rowCount();

if ($rows <= 0) {

    echo '
        <!-- Card -->
        <div class="col-11 white-bg mb-1 border shadow-lg">
            <div class="row justify-content-md-center align-items-center">
                <div class="card_body col-lg-2 col-sm-12 col-md-6">
                <img class="img-sistemas mx-auto d-block" src="assets/media/img/logorojo.png" onContextMenu="return false;" draggable="false">
                </div>
                <div class="col-lg-10 col-sm-12 col-md-6">
                <p class="text-start" style="margin: 1rem .75rem;">
                    <b class="mitr">Mensaje del sistema</b>
                    <br>
                    No se encontro ningun resultado que coincidan con esta busqueda: <b>' . $parametro . '</b>.
                </p>
                </div>
            </div>
        </div>
        ';
} else {


    // Mostramos los resultados
    while ($row = $query->fetch()) {

        echo '
            <!-- Card -->
            <div class="col-11 white-bg mb-1 border shadow-lg">
                <div class="row justify-content-md-center align-items-center">
                    <div class="card_body col-lg-2 col-sm-12 col-md-4">
                    <img class="img-sistemas mx-auto d-block" src="assets/media/img/marcas/' . $row['img_item'] . '" onContextMenu="return false;" draggable="false">
                    </div>
                    <div class="col-lg-8 col-sm-6 col-md-6">
                    <p class="text-start" style="margin: 1rem .75rem;">
                        <b class="mitr">' . $row['marca'] . '</b>
                        <br>
                        ' . $row['descripcion_item'] . '
                    </p>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-md-2" > 
                    <a class="btn btn-light btn-menus mitr rounded" href="https://web.refaccionariaarboledas.com.mx/clientes/wcp.wcplogin.aspx" target="_blank" role="button">
                        <img src="assets/media/img/Carrito.png">
                        COMPRA <br> EN LÍNEA
                    </a>
                    </div>
                </div>
            </div>
            ';
    }
}
