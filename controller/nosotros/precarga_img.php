<?php
include "../conexion.php";

if ($_POST['Rs'] == 'ok') {
  $query = $con->prepare("SELECT * FROM tab_cedis WHERE activo = 'Y'");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $query->execute();

  while ($row = $query->fetch()) {

    echo '
      <!-- ' . $row['cedis'] . ' -->
      <div class="grid rounded">
        <figure class="effect-goliath rounded bordered">
          <img src="assets/media/img/' . $row['img_cedis'] . '" alt="Proveedores de Refacciones Automotrices por mayoreo" onContextMenu="return false;" draggable="false"/>
            <figcaption>
              <h4 class="mitr smaller" style="background: rgba(0,0,0,0.4);">' . $row['cedis'] . ' Refaccionaria Arboledas S.A. de C.V.</h4>
              <p class="smaller">' . $row['direccion_cedis'] . ' Col. ' . $row['col_cedis'] . ' C.P. ' . $row['cp_cedis'] . '. ' . $row['mun_cedis'] . ', ' . $row['est_cedis'] . '.</p>
            </figcaption>
        </figure>
      </div>
    ';
  }
} else {
  return false;
}
