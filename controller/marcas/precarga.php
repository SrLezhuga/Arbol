<?php
include "../conexion.php";

if ($_POST['Rs'] == 'ok') {
  $query = $con->prepare("SELECT * FROM tab_marcas WHERE active = 'Y' ORDER BY nombre_marca ASC");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $query->execute();

  while ($row = $query->fetch()) {
    
    echo '
    <!--' . $row["nombre_marca"] . '-->
    <div class="col-lg-3 col-md-4 col-sm-12">
      <div class="card h-100 w-100 overflow-hidden rounded">
        <img src="assets/media/img/marcas/' . $row["img_marca"] . '" class="card-img-top imagen" alt="' . $row["nombre_marca"] . '">
        <div class="card_body h-100 card_marcas">
          <div>
            <h6 class="card_title mitr text-center">' . $row["nombre_marca"] . '</h6>
            <a class="btn btn-danger" href="detalles?m=' . $row["nombre_marca"] . '" role="button">Información y Garantias</a>
          </div>
        </div>
      </div>
    </div>
    ';
  }
} else {
  return false;
}



