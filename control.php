<?php include "controller/conexion.php"; ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>REFACCIONARIA ARBOLEDAS | Configuración</title>

  <script type="text/javascript" src="assets/js/catalogo.js"></script>
  <script type="text/javascript" src="assets/js/catalogoWeb.js"></script>
  <script type="text/javascript" src="assets/js/marcas.js"></script>
  <script type="text/javascript" src="assets/js/pregunta.js"></script>
  <script type="text/javascript" src="assets/js/directorio.js"></script>
  <script type="text/javascript" src="assets/js/nosotros.js"></script>
  <script type="text/javascript" src="assets/js/banner.js"></script>
  <script type="text/javascript" src="assets/js/avisos.js"></script>
  <script type="text/javascript" src="assets/js/garantias.js"></script>
</head>

<body>
  <div id="wrapper">

    <!-- titulo -->
    <div class="container menus rounded mt-5">
      <h2 class="mitr">CONFIGURACIÓN</h2>
    </div>

    <section>
      <div class="container mt-5 mb-3">
        <div class="justify-content-center align-items-center">

          <div class="d-flex align-items-start">
            <div class="nav border flex-column nav-pills me-3 bg-white shadow-lg" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <button class="nav-link active" id="v-pills-catalogos-tab" data-bs-toggle="pill" data-bs-target="#v-pills-catalogos" type="button" role="tab" aria-controls="v-pills-catalogos" aria-selected="true">CATALOGOS</button>
              <button class="nav-link" id="v-pills-catalogosWeb-tab" data-bs-toggle="pill" data-bs-target="#v-pills-catalogosWeb" type="button" role="tab" aria-controls="v-pills-catalogosWeb" aria-selected="false">CATALOGOS WEB</button>
              <button class="nav-link" id="v-pills-marcas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-marcas" type="button" role="tab" aria-controls="v-pills-marcas" aria-selected="false">MARCAS</button>
              <button class="nav-link" id="v-pills-sistemas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sistemas" type="button" role="tab" aria-controls="v-pills-sistemas" aria-selected="false">SISTEMAS</button>
              <button class="nav-link" id="v-pills-productos-tab" data-bs-toggle="pill" data-bs-target="#v-pills-productos" type="button" role="tab" aria-controls="v-pills-productos" aria-selected="false">PRODUCTOS</button>
              <button class="nav-link" id="v-pills-preguntas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-preguntas" type="button" role="tab" aria-controls="v-pills-preguntas" aria-selected="false">PREGUNTAS</button>
              <button class="nav-link" id="v-pills-directorio-tab" data-bs-toggle="pill" data-bs-target="#v-pills-directorio" type="button" role="tab" aria-controls="v-pills-directorio" aria-selected="false">DIRECTORIO</button>
              <button class="nav-link" id="v-pills-nosotros-tab" data-bs-toggle="pill" data-bs-target="#v-pills-nosotros" type="button" role="tab" aria-controls="v-pills-nosotros" aria-selected="false">NOSOTROS</button>
              <button class="nav-link" id="v-pills-banners-tab" data-bs-toggle="pill" data-bs-target="#v-pills-banners" type="button" role="tab" aria-controls="v-pills-banners" aria-selected="false">BANNERS</button>
              <button class="nav-link" id="v-pills-subbanners-tab" data-bs-toggle="pill" data-bs-target="#v-pills-subbanners" type="button" role="tab" aria-controls="v-pills-subbanners" aria-selected="false">SUBBANNERS</button>
              <button class="nav-link" id="v-pills-slider-tab" data-bs-toggle="pill" data-bs-target="#v-pills-slider" type="button" role="tab" aria-controls="v-pills-slider" aria-selected="false">SLIDER</button>
              <button class="nav-link" id="v-pills-avisos-tab" data-bs-toggle="pill" data-bs-target="#v-pills-avisos" type="button" role="tab" aria-controls="v-pills-avisos" aria-selected="false">AVISOS</button>
              <button class="nav-link" id="v-pills-garantias-tab" data-bs-toggle="pill" data-bs-target="#v-pills-garantias" type="button" role="tab" aria-controls="v-pills-garantias" aria-selected="false">GARANTIAS</button>
              <button class="nav-link" id="v-pills-suscripcion-tab" data-bs-toggle="pill" data-bs-target="#v-pills-suscripcion" type="button" role="tab" aria-controls="v-pills-suscripcion" aria-selected="false">SUSCRIPCIÓN</button>


            </div>
            <div class="tab-content" id="v-pills-tabContent" style="width: 100%;">
              <div class="tab-pane fade show active" id="v-pills-catalogos" role="tabpanel" aria-labelledby="v-pills-catalogos-tab">
                <?php include_once('controller/catalogo/config.php'); ?>
              </div>
              <div class="tab-pane fade" id="v-pills-catalogosWeb" role="tabpanel" aria-labelledby="v-pills-catalogosWeb-tab">
                <?php include('controller/catalogo/configWeb.php'); ?>
              </div>
              <div class="tab-pane fade" id="v-pills-marcas" role="tabpanel" aria-labelledby="v-pills-marcas-tab">
                <?php include('controller/marcas/config.php'); ?>
              </div>
              <div class="tab-pane fade" id="v-pills-sistemas" role="tabpanel" aria-labelledby="v-pills-sistemas-tab">...sistemas</div>
              <div class="tab-pane fade" id="v-pills-productos" role="tabpanel" aria-labelledby="v-pills-productos-tab">...productos</div>
              <div class="tab-pane fade" id="v-pills-preguntas" role="tabpanel" aria-labelledby="v-pills-preguntas-tab">
                <?php include('controller/preguntas/config.php'); ?>
              </div>
              <div class="tab-pane fade" id="v-pills-directorio" role="tabpanel" aria-labelledby="v-pills-directorio-tab">
                <?php include('controller/directorio/config.php'); ?>
              </div>
              <div class="tab-pane fade" id="v-pills-nosotros" role="tabpanel" aria-labelledby="v-pills-nosotros-tab">
                <?php include('controller/nosotros/config.php'); ?>
              </div>
              <div class="tab-pane fade" id="v-pills-banners" role="tabpanel" aria-labelledby="v-pills-banners-tab">
                <?php include('controller/banner/config.php'); ?>
              </div>
              <div class="tab-pane fade" id="v-pills-subbanners" role="tabpanel" aria-labelledby="v-pills-subbanners-tab">
                <?php include('controller/subbaner/config.php'); ?>
              </div>
              <div class="tab-pane fade" id="v-pills-slider" role="tabpanel" aria-labelledby="v-pills-slider-tab">
                <?php include('controller/slider/config.php'); ?>
              </div>
              <div class="tab-pane fade" id="v-pills-avisos" role="tabpanel" aria-labelledby="v-pills-avisos-tab">
                <?php include('controller/avisos/config.php'); ?>
              </div>
              <div class="tab-pane fade" id="v-pills-garantias" role="tabpanel" aria-labelledby="v-pills-garantias-tab">
                <?php include('controller/garantias/config.php'); ?>
              </div>
              <div class="tab-pane fade" id="v-pills-suscripcion" role="tabpanel" aria-labelledby="v-pills-suscripcion-tab">
                <?php include('controller/suscripcion/config.php'); ?>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </div>

</body>

</html>