 <!-- Modal -->
 <div class="modal fade" id="ModalIndex" tabindex="-1" aria-labelledby="ModalIndexLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header p-0">
                 <!-- carusel -->
                 <div id="carouselPromos" class="carousel slide" data-bs-ride="carousel">
                     <div class="carousel-inner" id="promo-slider">

                         <!-- carusel item -->
                         <div class="carousel-item active" data-bs-interval="5000">
                             <img class="img-fluid rounded" src="assets/media/img/modal/placeholder.jpg" alt="Proveedores de Refacciones Automotrices por mayoreo" onContextMenu='return false;' draggable='false'>
                         </div>
                         <!-- carusel item -->
                         <div class="carousel-item" data-bs-interval="5000">
                             <img class="img-fluid rounded" src="assets/media/img/modal/placeholder.jpg" alt="Proveedores de Refacciones Automotrices por mayoreo" onContextMenu='return false;' draggable='false'>

                         </div>
                         <!-- carusel item -->
                         <div class="carousel-item" data-bs-interval="5000">
                             <img class="img-fluid rounded" src="assets/media/img/modal/placeholder.jpg" alt="Proveedores de Refacciones Automotrices por mayoreo" onContextMenu='return false;' draggable='false'>

                         </div>
                         <!-- carusel item -->
                         <div class="carousel-item" data-bs-interval="5000">
                             <img class="img-fluid rounded" src="assets/media/img/modal/placeholder.jpg" alt="Proveedores de Refacciones Automotrices por mayoreo" onContextMenu='return false;' draggable='false'>

                         </div>
                         <!-- carusel item -->
                         <div class="carousel-item" data-bs-interval="5000">
                             <img class="img-fluid rounded" src="assets/media/img/modal/placeholder.jpg" alt="Proveedores de Refacciones Automotrices por mayoreo" onContextMenu='return false;' draggable='false'>

                         </div>
                     </div>
                     <!-- carusel btns -->
                     <button class="carousel-control-prev" type="button" data-bs-target="#carouselPromos" data-bs-slide="prev">
                         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                         <span class="visually-hidden">Previous</span>
                     </button>
                     <button class="carousel-control-next" type="button" data-bs-target="#carouselPromos" data-bs-slide="next">
                         <span class="carousel-control-next-icon" aria-hidden="true"></span>
                         <span class="visually-hidden">Next</span>
                     </button>
                 </div>

                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="top: 1rem; position: absolute; right: 1rem; z-index: 100;"></button>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal -->
 <div class="modal fade" id="suscripcionModal" tabindex="-1" aria-labelledby="suscripcionModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content " style="border-radius: 1.3rem !important;">
             <div class="modal-header" style="background: #f8f9fa;">
                 <div class="row">
                     <div class="col-12">

                         <h3 class="modal-title text-center mitr" id="suscripcionModalLabel">Suscr??bete a nuestro bolet??n</h3>
                         <p class="text-center">
                             <img class="img-arbol-menu" src="assets/media/img/LogoRojo.png" alt="Refaccionaria Arboledas" onContextMenu='return false;' draggable='false'>
                         </p>
                         <h6 class="smaller text-center">Suscr??base a nuestro bolet??n mensual para recibir las ??ltimas noticias, actualizaciones y ofertas incre??bles directamente en su correo.</h6>

                         <div class="form-floating mb-1">
                             <input type="text" class="form-control form-reset" id="txt_nombre" placeholder="Fecha Cat??logo" autocomplete="off">
                             <label for="txt_nombre"><i class="fas fa-bookmark"></i> Nombre</label>
                         </div>
                         <div class="form-floating mb-1">
                             <input type="text" class="form-control form-reset" id="txt_telefono" placeholder="Fecha Cat??logo" autocomplete="off">
                             <label for="txt_telefono"><i class="fas fa-phone-alt"></i> Tel??fono</label>
                         </div>
                         <div class="form-floating mb-2">
                             <input type="text" class="form-control form-reset" id="txt_correo" placeholder="Fecha Cat??logo" autocomplete="off">
                             <label for="txt_correo"><i class="fas fa-at"></i> Correo</label>
                         </div>
                     </div>
                     <h6 class="text-muted"><small>Puedes cancelar tu suscripci??n enviando un correo</small></h6>
                     <div class="col-12 text-end">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                         <button type="button" class="btn btn-danger" onclick="suscripcion()">Suscribirse</button>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </div>

 <!-- Carrito top -->
 <div class="car-top car-down ocultar-banner" id="arriba">
     <span><img src="assets/media/img/car.png" alt="Proveedores de Refacciones Automotrices por mayoreo"></span>
 </div>

 <!-- Btn Social-->
 <center class="ocultar-banner">
     <ul class="social-media-container">
         <li class="social-media whatsapp">
             <i class="fab fa-whatsapp"></i>
             <a class="small text-decoration-none" href="https://api.whatsapp.com/send?phone=523315878534" target="_blank">Chatea con nosotros</a>
         </li>
         <li class="social-media youtube">
             <i class="fab fa-youtube"></i>
             <a class="small text-decoration-none" href="https://www.youtube.com/user/RefArboledas/" target="_blank">Suscr??bete al canal</a>
         </li>
         <li class="social-media facebook">
             <i class="fab fa-facebook-f"></i>
             <a class="small text-decoration-none" href="https://www.messenger.com/t/165424793629852/" target="_blank">Siguenos en Facebook</a>
         </li>
         <li class="social-media instagram">
             <i class="fab fa-instagram"></i>
             <a class="small text-decoration-none" href="https://www.instagram.com/refaccionaria.arboledas/" target="_blank">S??guenos en instagram</a>
         </li>
         <li class="social-media linkedin">
             <i class="fab fa-linkedin-in"></i>
             <a class="small text-decoration-none" href=" https://mx.linkedin.com/company/refaccionaria-arboledas-s.a.-de-c.v." target="_blank">S??guenos en linkedin</a>
         </li>
         <br>
         <li class="social-media black">
             <i class="fas fa-newspaper"></i>
             <a class="small text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#suscripcionModal">Suscribete al boletin.</a>
         </li>
         <li class="social-media black">
             <i class="fas fa-bell"></i>
             <a class="small text-decoration-none" href="#" id="verPromocionesModal">Ver promociones</a>
         </li>
     </ul>
 </center>

 <!-- Footer -->
 <section class="text-center text-lg-start text-white small" style="background-color: #002262;  border-top: 3px solid #d41636;">

     <!-- Section: Links  -->
     <section class="">
         <div class="container text-center text-md-start">
             <!-- Grid row -->
             <div class="row mt-3 justify-content-center align-items-center">
                 <!-- Grid column -->
                 <div class="col-md-3 col-lg-2 mx-auto mb-4">
                     <!-- Content -->
                     <img class="img-footer" src="assets/media/img/LogoBlanco.png" alt="Refaccionaria Arboledas" onContextMenu='return false;' draggable='false' style='max-width: 125px;max-height: 125px;'>
                 </div>
                 <!-- Grid column -->

                 <!-- Grid column -->
                 <div class="col-md-9 col-lg-5 mx-auto mb-4">
                     <!-- Links -->
                     <h6 class="text-uppercase fw-bold mitr">Refaccionaria Arboledas</h6>

                     <p>
                         Es una empresa mexicana dedicada a la distribuci??n de refacciones automotrices. Con m??s de 30 a??os en el mercado tenemos el prop??sito de ser corresponsables con el desarrollo de nuestros socios de negocios.
                     </p>
                 </div>
                 <!-- Grid column -->

                 <!-- Grid column -->
                 <div class="col-md-12 col-lg-5 mx-auto mb-md-0 mb-4">
                     <!-- Links -->
                     <h6 class="text-uppercase fw-bold mitr">Contacto</h6>
                     <p>
                         <a class="color-white no-link" href="https://www.google.com/maps/place/Refaccionaria+Arboledas+SA+de+CV/@20.6241852,-103.328707,20z/data=!4m5!3m4!1s0x8428b25924c5075f:0x10f56039859b589b!8m2!3d20.6242434!4d-103.328454" target="_blank">
                             <i class="fas fa-location-arrow"></i>
                             Altos Hornos #2755 Col. ??lamo industrial
                             C.P. 45560, Tlaquepaque, Jalisco, M??xico.
                         </a>
                         <br>
                         <a class="color-white no-link" href="mailto:hola@refaccionariaarboledas.com.mx">
                             <i class="far fa-envelope"></i> hola@refaccionariaarboledas.com.mx
                         </a>
                         <br>
                         <a class="color-white no-link" href="tel:3338371280">
                             <i class="fas fa-phone-alt"></i> Info: 3338371280
                         </a> /
                         <a class="color-white no-link" href="tel:3338371285">
                             <i class="fas fa-phone-alt"></i> Ventas: 3338371285
                         </a>
                 </div>
                 <!-- Grid column -->
             </div>
             <!-- Grid row -->
         </div>
         <!-- Copyright -->
         <div class="text-center p-3 border-top" style="background-color: #212529">
             ?? <?php echo date("Y"); ?> Copyright:
             <a class="text-white small" href="www.refaccionariaarboledas.com.mx">Refaccionaria Arboledas</a> <br>
             <a class="text-white small" href="politicas">Aviso de Privacidad </a>|
             <a class="text-white small" href="cookies">P??litica de Cookies</a>
         </div>
         <!-- Copyright -->
     </section>
     <!-- Section: Links  -->


 </section>
 <!-- Footer -->

 <script type="text/javascript" src="assets/js/js_footer.js"></script>