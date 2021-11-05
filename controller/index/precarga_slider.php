<?php
include "../conexion.php";

if ($_POST['Rs'] == 'ok') {
  $query = $con->prepare("SELECT * FROM tab_slider WHERE active = 'Y'");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $query->execute();
  $count = 1;

  while ($row = $query->fetch()) {

    $active = ($count == 1) ? $active = "active" : $active = "";

    echo '

      <!-- carusel item ' . $row['id_slider'] . '-->
      <div class="carousel-item ' . $active . '" data-bs-interval="5000">
        <img src="assets/media/img/banners/' . $row['img_pc'] . '" class="ocultar-banner w-100">
        <img src="assets/media/img/banners/' . $row['img_movil'] . '" class="ocultar-banner-movil w-100">
      </div>
    ';
    $count++;
  }
  echo '
    <!-- carusel btns -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
  ';
} else {
  return false;
}
