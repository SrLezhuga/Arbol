<?php
include "../conexion.php";

if ($_POST['Rs'] == 'ok') {
  $query = $con->prepare("SELECT * FROM tab_subslider WHERE active = 'Y'");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $query->execute();
  $count = 1;

  while ($row = $query->fetch()) {

    $active = ($count == 1) ? $active = "active" : $active = "";

    echo '

      <!-- carusel item ' . $row['id_subslider'] . '-->
      <div class="carousel-item ' . $active . '" data-bs-interval="5000">
        <img src="assets/media/img/banners/' . $row['img'] . '" class="w-100">
      </div>
    ';
    $count++;
  }
} else {
  return false;
}
