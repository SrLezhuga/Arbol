<fieldset class="border p-2 bg-white shadow-lg">
    <legend class="w-auto"><b>Directorio:</b></legend>

    <div class="row">
        <div class="col-8">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book-open"></i></span>
                <select id="formDirectorio" name="formDirectorio" class="form-select form-select-lg" aria-label="Default select example" onchange="getDirectorio();"></select>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-secondary" id="btn-crear-catalogo" type="button" onclick="nuevoDirectorio()">Nuevo <i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-danger" id="btn-guardar-directorio" type="button" onclick="guardarDirectorio()">Guardar <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="hidden" class="form-control form-reset" id="id_cedis" placeholder="Id" autocomplete="off">
                        <label for="id_cedis"><i class="fas fa-bookmark"></i> Id</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="cedis" placeholder="Nombre" autocomplete="off">
                        <label for="cedis"><i class="fas fa-bookmark"></i> Nombre</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="direccion_cedis" placeholder="Direccion" autocomplete="off">
                        <label for="direccion_cedis"><i class="fas fa-bookmark"></i> Direccion</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="col_cedis" placeholder="Colonia" autocomplete="off">
                        <label for="col_cedis"><i class="fas fa-bookmark"></i> Colonia</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="cp_cedis" placeholder="Codigo Postal" autocomplete="off">
                        <label for="cp_cedis"><i class="fas fa-bookmark"></i> Código Postal</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="mun_cedis" placeholder="Municipio" autocomplete="off">
                        <label for="mun_cedis"><i class="fas fa-bookmark"></i> Municipio</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="est_cedis" placeholder="Estado" autocomplete="off">
                        <label for="est_cedis"><i class="fas fa-bookmark"></i> Estado</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <textarea class="form-control form-reset" placeholder="Url Google Maps" id="textareaMap_cedis" style="height: auto;"></textarea>
                        <label for="textareaMap_cedis"><i class="fas fa-bookmark"></i> Url Google Maps</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="email_cedis" placeholder="Correo" autocomplete="off">
                        <label for="email_cedis"><i class="fas fa-bookmark"></i> Correo</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="tel_info" placeholder="Teléfono Información" autocomplete="off">
                        <label for="tel_info"><i class="fas fa-bookmark"></i> Tel Información</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="tel_ventas" placeholder="Teléfono Ventas" autocomplete="off">
                        <label for="tel_ventas"><i class="fas fa-bookmark"></i> Tel Ventas</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="file-field">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control form-reset" id="img_directorio" placeholder="Imagen" autocomplete="off">
                            <label for="img_directorio"><i class="fas fa-bookmark"></i> Imagen Cedis</label>
                        </div>
                        <input id="imgDirectorio" type="file">
                    </div>
                </div>
                <div class="col-6">
                    <div class="file-field">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control form-reset" id="img_logo_cedis" placeholder="Imagen" autocomplete="off">
                            <label for="img_logo_cedis"><i class="fas fa-bookmark"></i> Logo Cedis</label>
                        </div>
                        <input id="imgLogoCedis" type="file">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="file-field mb-1">
                <figure class="figure">
                    <img class="Img-Cedis mx-auto d-block img-thumbnail figure-img" src="assets/media/img/loader/PlaceholderWeb.png" onerror="this.src='assets/media/img/loader/PlaceholderWeb.png';" style="width: 250px; height: 125px;">
                    <figcaption class="figure-caption">Tamaño: 1600 x 730 pixeles</figcaption>
                </figure>
            </div>
            <div class="file-field mb-1">
                <figure class="figure">
                    <img class="Img-Logo-Cedis mx-auto d-block img-thumbnail figure-img" src="assets/media/img/loader/PlaceholderWeb.png" onerror="this.src='assets/media/img/loader/PlaceholderWeb.png';" style="width: 200px; height: 200px;">
                    <figcaption class="figure-caption">Tamaño: 200 x 200 pixeles</figcaption>
                </figure>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-secondary" id="btn-ver-directorio" onclick="verCatalogo()" type="button" data-bs-toggle="modal" data-bs-target="#modalCatalogo">Vista Previa <i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-danger" type="button" onclick="limpiarDirectorio()">Limpiar Formulario <i class="fas fa-eraser"></i></button>
                    </div>
                </div>
                <div class="col-6" style="font-size: 1.5rem;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckBoxDirectorio" name="CheckBoxDirectorio" value="Y">
                        <label class="form-check-label" for="CheckBoxDirectorio">Visible</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCatalogo" tabindex="-1" aria-labelledby="modalLabelCatalogo" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelCatalogo">Vista Prevía</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="justify-content-center align-items-center">
                        <!--Item card -->
                        <div class='cards rounded border align-items-center text-center align-self-center' style="left: 50%; transform: translate(-50%, 0%);">
                            <img class='rounded' src='' id="modalImgDirectorio">
                            <div class='cards-desc rounded'>
                                <div class='cards-div'>
                                    <h4 class='mitr' id="modaldireccion_cedisCatalogo"></h4>
                                    <h6 class='glacial small' id="modalcol_cedisCatalogo"></h6>
                                    <div class='d-grid gap-2'>
                                        <btn class='btn btn-sm btn-danger small' type='button' disabled><i class='far fa-eye'></i> Ver Online</btn>
                                        <btn class='btn btn-sm btn-danger small' type='button' disabled><i class='fas fa-file-download'></i> Descargar</btn>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</fieldset>
