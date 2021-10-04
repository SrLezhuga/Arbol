<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>Refaccionaria Arboledas | Contacto</title>
</head>

<body>
  <div id="wrapper">

    <!-- Nav Menu-->
    <?php require('controller/common/nav_menu.php'); ?>
    <!-- titulo -->
    <div class="container menus rounded">
      <h2 class="mitr">CONTACTO</h2>
    </div>

    <section>
      <div class="container mb-3 mt-5">
        <div class="row justify-content-center align-items-center" id="contenedor">

          <div id="flex-container" class="testimonials border rounded shadow-lg">
            <div id="left-zone">
              <ul class="list">
                <!-- Matriz GDL-->
                <li class="item">
                  <input type="radio" id="radio_testimonial-1" name="basic_carousel" checked="checked" />
                  <label class="label_testimonial" for="radio_testimonial-1">Matriz Guadalajara</label>
                  <div class="content-test content_testimonial">
                    <span class="picto">
                      <img src="assets/media/img/iconos/LOGO CEDIS GDL.png" onContextMenu='return false;' draggable='false'>
                    </span>
                    <h1 class="mitr">Matriz Guadalajara</h1>
                    <p>Altos Hornos #2755 Col. Álamo industrial
                      <br>C.P. 45560. Tlaquepaque, Jalisco.
                    </p>
                    <p>
                      <i class="fas fa-phone-alt"></i> Info: <a href="tel:3338371280">3338371280</a>
                      &nbsp;
                      <i class="fas fa-phone-alt"></i> Ventas: <a href="tel:3338371285">3338371285</a>
                    </p>
                    <p>
                      <i class="far fa-envelope"></i> Correo: <a href="mailto:hola@refaccionariaarboledas.com.mx">hola@refaccionariaarboledas.com.mx</a>
                    </p>
                    <p class="testimonialFrom">
                      <a href="https://www.google.com/maps/place/Refaccionaria+Arboledas+SA+de+CV/@20.6241852,-103.328707,20z/data=!4m5!3m4!1s0x8428b25924c5075f:0x10f56039859b589b!8m2!3d20.6242434!4d-103.328454" target="_blank" class="btn btn-danger"><i class="fas fa-map-marker-alt"></i> Ver en Google Maps</a>
                    </p>
                  </div>
                </li>
                <!-- Cedis MTY-->
                <li class="item">
                  <input type="radio" id="radio_testimonial-2" name="basic_carousel" />
                  <label class="label_testimonial" for="radio_testimonial-2">Cedis Monterrey</label>
                  <div class="content-test content_testimonial">
                    <span class="picto">
                      <img src="assets/media/img/iconos/LOGO CEDIS MTY.png" onContextMenu='return false;' draggable='false'>

                    </span>
                    <h1 class="mitr">Cedis Monterrey</h1>
                    <p>Bonifacio Salinas #108 Col. Industrial Las Américas
                      <br>C.P. 67128. Guadalupe, Nuevo León.
                    </p>
                    <p>
                      <i class="fas fa-phone-alt"></i> Info: <a href="tel:3338371280">placeholder</a>
                      &nbsp;
                      <i class="fas fa-phone-alt"></i> Ventas: <a href="tel:3338371285">placeholder</a>
                    </p>
                    <p>
                      <i class="far fa-envelope"></i> Correo: <a href="mailto:hola@refaccionariaarboledas.com.mx">hola@refaccionariaarboledas.com.mx</a>
                    </p>
                    <p class="testimonialFrom">
                      <a href="https://www.google.com/maps/place/Refaccionaria+Arboledas/@25.7011461,-100.2400004,18.75z/data=!4m13!1m7!3m6!1s0x8662eabf08222bcb:0xef6281387d0e18cd!2sAv+Bonifacio+Salinas+Nte+108,+Antiguo+Nogalar,+67128+Guadalupe,+N.L.!3b1!8m2!3d25.7015881!4d-100.2404084!3m4!1s0x8662eabfa6313af5:0xad03efde29fb5a3c!8m2!3d25.7015775!4d-100.240204" target="_blank" class="btn btn-danger"><i class="fas fa-map-marker-alt"></i> Ver en Google Maps</a>
                    </p>
                    <br>
                  </div>
                </li>
              </ul>
            </div>
            <div id="right-zone"></div>
          </div>


        </div>
      </div>

      <script>
        // Makeshift carousel function that gets invoked with the Index to start it off, then the callback increments the index to recursively invoke the same function. Works even in IE11!
        var testimonialItems = document.querySelectorAll(".item label");
        var timer;

        function cycleTestimonials(index) {
          timer = setTimeout(function() {
            var evt;
            if (document.createEvent) {
              //If browser = IE, then polyfill
              evt = document.createEvent('MouseEvent');
              evt.initMouseEvent('click', true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
            } else {
              //If Browser = modern, then create new MouseEvent
              evt = new MouseEvent("click", {
                view: window,
                bubbles: true,
                cancelable: true,
                clientX: 20
              });
            }
            var ele = "." + testimonialItems[index].className;
            var ele2 = document.querySelector(ele)
            ele2.dispatchEvent(evt);
            index++; // Increment the index
            if (index >= testimonialItems.length) {
              index = 0; // Set it back to `0` when it reaches `3`
            }
            cycleTestimonials(index); // recursively call `cycleTestimonials()`
            document.querySelector(".testimonials").addEventListener("click", function() {
              clearTimeout(timer); //stop the carousel when someone clicks on the div
            });
          }, 2000); //adjust scroll speed in miliseconds
        }
        //run the function
        cycleTestimonials(0);
      </script>


    </section>


    <section>
      <div class="container mt-5 mb-5">
        <div class="row justify-content-center align-items-center">
          <!-- from -->
          <div class="col-lg-8 col-md-8 col-sm-12 bg-white rounded border shadow-lg">
            <div class="row">
              <!-- campo nombre -->
              <div class="col-lg-12">
                <div class="mb-3 mt-3">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    <label for="floatingSelect"><i class="fas fa-user"></i> Nombre:</label>
                  </div>
                </div>
              </div>
              <!-- campo correo -->
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    <label for="floatingSelect"><i class="fas fa-at"></i> Correo:</label>
                  </div>
                </div>
              </div>
              <!-- campo telefono -->
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    <label for="floatingSelect"><i class="fas fa-phone-alt"></i> Teléfono:</label>
                  </div>
                </div>
              </div>
              <!-- campo estado -->
              <div class="col-12">
                <div class="mb-3">
                  <div class="form-floating">
                    <input class="form-control dt" list="datalistOptions" id="floatingSelect" placeholder="Type to search...">
                    <datalist id="datalistOptions">
                      <option value="Aguascalientes">
                      <option value="Baja California">
                      <option value="Baja California Sur">
                      <option value="Campeche">
                      <option value="Coahuila">
                      <option value="Colima">
                      <option value="Chiapas">
                      <option value="Chihuahua">
                      <option value="Durango">
                      <option value="Distrito Federal">
                      <option value="Guanajuato">
                      <option value="Guerrero">
                      <option value="Hidalgo">
                      <option value="Jalisco">
                      <option value="México">
                      <option value="Michoacán">
                      <option value="Morelos">
                      <option value="Nayarit">
                      <option value="Nuevo León">
                      <option value="Oaxaca">
                      <option value="Puebla">
                      <option value="Querétaro">
                      <option value="Quintana Roo">
                      <option value="San Luis Potosí">
                      <option value="Sinaloa">
                      <option value="Sonora">
                      <option value="Tabasco">
                      <option value="Tamaulipas">
                      <option value="Tlaxcala">
                      <option value="Veracruz">
                      <option value="Yucatán">
                      <option value="Zacatecas">
                    </datalist>
                    <label for="floatingSelect"><i class="fas fa-location-arrow"></i> Estado:</label>
                  </div>
                </div>
              </div>
              <!-- campo mensaje -->
              <div class="col-12">
                <div class="mb-3">
                  <div class="form-floating">
                    <textarea class="form-control" rows="5" placeholder="Mensaje" id="floatingTextarea" style="height: auto;"></textarea>
                    <label for="floatingTextarea"><i class="fas fa-comment-dots"></i> Mensaje:</label>
                  </div>
                </div>
              </div>
              <!-- btn enviar -->
              <div class="col-12">
                <div class="mb-3 d-grid gap-2">
                  <button type="button" class="btn btn-lg btn-danger"><i class="fas fa-paper-plane"></i> Enviar</button>
                </div>
              </div>


            </div>
          </div>



        </div>
      </div>

    </section>


  </div>

  <br>

  <?php require('controller/common/footer.php'); ?>

</body>



</html>