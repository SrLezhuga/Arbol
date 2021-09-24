<?php
include "../conexion.php";

$query = $con->prepare("SELECT * FROM tab_catalogo_web");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();

while ($row = $query->fetch()) {
  echo
  '
    <!-- Catalogo ' . $row["nombre_catalogo_web"] . '-->
    <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
      <div class="card h-100 overflow-hidden rounded shadow-lg">
        <img src="assets/media/img/marcas/' . $row["img_catalogo_web"] . '" class="card-img-top imagen" alt="' . $row["nombre_catalogo_web"] . '">
        <div class="card_body h-100 card_catalogos">
          <div class="card_center">
            <h6 class="card_title mitr text-center">
              ' . $row["nombre_catalogo_web"] . '
            </h6>
            <p class="card-text text_small text-center">
              ' . $row["info_catalogo_web"] . '
            </p>
            <a style="width: 100%;" class="btn btn-sm btn-danger small" href="' . $row["url_catalogo_web"] . '" target="_blank" role="button"><i class="fas fa-link"></i> Ver Online</a>
          </div>
        </div>
      </div>
    </div>
  ';
}
