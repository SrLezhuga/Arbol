<?php
include "../conexion.php";

if ($_POST['Rs'] == 'ok') {
  $query = $con->prepare("SELECT * FROM tab_nosotros WHERE campo = 'Nosotros'");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $query->execute();

  $row = $query->fetch();

  if ($row['activo'] == 'Y') {
    echo '
    <div class="container mt-5 mb-3">
      <div class="row justify-content-center align-items-center text-center">
        <div class="col-12">
          <h2 class="mitr">SOBRE NOSOTROS</h2>
          <div class="separator-top"></div>
        </div>
      </div>
    </div>

    <div class="container mb-3">
      <div class="row justify-content-center align-items-center text-center">
        <div class="col-md-10 ">
          <fieldset class="border  p-3 bg-body rounded">

            <div class="section-title">

              <p>' . $row['valor'] . '</p>
            </div>
          </fieldset>
        </div>
      </div>
    </div>>';
  }

  $query = $con->prepare("SELECT * FROM tab_nosotros WHERE campo = 'Misión' ");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $query->execute();

  $row = $query->fetch();

  echo '
    <div class="container mb-3">
      <div class="row justify-content-center align-items-center text-center">
  ';

  if ($row['activo'] == 'Y') {
    echo '
        <div class="col-lg-6 col-md-6 col-sm-12 mt-3 mb-3">
          <h2 class="mitr">MISIÓN</h2>
          <div class="separator-top"></div>
          <fieldset class="border  p-3 bg-body rounded">

            <div class="section-title">

              <p>' . $row['valor'] . '</p>
            </div>
          </fieldset>
        </div>
    ';
  }
  $query = $con->prepare("SELECT * FROM tab_nosotros WHERE campo = 'Visión' ");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $query->execute();

  $row = $query->fetch();

  if ($row['activo'] == 'Y') {
    echo '
        <div class="col-lg-6 col-md-6 col-sm-12 mt-3 mb-3">
          <h2 class="mitr">VISIÓN</h2>
          <div class="separator-top"></div>
          <fieldset class="border  p-3 bg-body rounded">

            <div class="section-title">

              <p>' . $row['valor'] . '</p>
            </div>
          </fieldset>
        </div>

        ';
  }
  echo '
      </div>
    </div>
    ';
} else {
  return false;
}
