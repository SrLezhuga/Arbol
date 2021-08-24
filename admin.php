<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>Refaccionaria Arboledas | Inicio</title>
</head>

<body>

  <!-- loader -->
  <div class="loader-in" id="loader">
    <img src="assets/media/img/loader/index.gif" alt="Proveedores de Refacciones Automotrices por mayoreo">
  </div>



  <section>
    <div class="container">
      <div class="row justify-content-center vh-100 align-items-center" id="contenedor">
        <div class="border rounded shadow-lg col-3 bg-white">

          <div class="card login-content border-0">
            <div class="card-body">
              <div class="text-center">
                <img class="logo" src="assets/media/img/LogoRojo.png">
              </div>
              <h3 class="text-logo">Registrate:</h3>
              <br>
              <form class="text-center">
                <div class="mb-3">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    <label for="floatingSelect"><i class="fas fa-user-circle"></i> Usuario:</label>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    <label for="floatingSelect"><i class="fas fa-key"></i> Contraseña:</label>
                  </div>
                </div>

                <a href="control" class="btn btn-primary border-0" type="submit" name="submit">Ingresar</a>

              </form>
            </div>
          </div>
        </div>

      </div>
    </div>

  </section>



</body>

</html>