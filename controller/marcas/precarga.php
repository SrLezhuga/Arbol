<?php
include "../conexion.php";

if ($_POST['Rs'] == 'ok') {
  $query = $con->prepare("SELECT * FROM tab_marcas");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $query->execute();

  while ($row = $query->fetch()) {
    
    echo '
    <!--' . $row["nombre_marca"] . '-->
    <div class="col-lg-3 col-md-2 col-sm-1">
      <div class="card h-100 overflow-hidden rounded shadow-lg">
        <img src="assets/media/img/marcas/' . $row["img_marca"] . '" class="card-img-top imagen" alt="' . $row["nombre_marca"] . '">
        <div class="card_body h-100 card_marcas">
          <h6 class="card_title mitr text-center">' . $row["nombre_marca"] . '</h6>
          <p class="card-text text_small text-center">
            ' . $row["info_marca"] . '
          </p>
        </div>
      </div>
    </div>
    ';
  }
} else {
  return false;
}


