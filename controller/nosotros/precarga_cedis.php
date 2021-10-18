<?php
include "../conexion.php";

if ($_POST['Rs'] == 'ok') {
    $query = $con->prepare("SELECT * FROM tab_cedis WHERE activo = 'Y'");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();

    while ($row = $query->fetch()) {

        echo '
            <!-- ' . $row['cedis'] . ' -->
            <div class="container rounded mb-3" style="background-color: rgba(0, 0, 0, 0.8);">
            <div class="justify-content-center align-items-center">
              <center>
                <h2 class="mitr text-white pt-1"><b> ' . $row['cedis'] . '</b> Refaccionaria Arboledas S.A. de C.V.</h2>
    
                <figure class="figure">
                  <img class="figure-img img-fluid rounded mt-2" src="assets/media/img/' . $row['img_cedis'] . '" alt="Proveedores de Refacciones Automotrices por mayoreo" onContextMenu="return false;" draggable="false">
                  <figcaption class="figure-caption text-white">' . $row['direccion_cedis'] . ' Col. ' . $row['col_cedis'] . ' C.P. ' . $row['cp_cedis'] . '. ' . $row['mun_cedis'] . ', ' . $row['est_cedis'] . '.</figcaption>
                </figure>
              </center>
            </div>
          </div>
    ';
    }
} else {
    return false;
}
