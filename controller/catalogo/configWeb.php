<fieldset class="border p-2 bg-white shadow-lg">
    <legend class="w-auto"><b>Catálogo Web:</b></legend>

    <div class="row">
        <div class="col-8">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book-open"></i></span>
                <select id="formCatalogoWeb" name="formCatalogoWeb" class="form-select form-select-lg" aria-label="Default select example" onchange="getCatalogoWeb();"></select>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-secondary" id="btn-crear-catalogo" type="button" onclick="nuevoCatalogoWeb()">Nuevo <i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-danger" id="btn-guardar-catalogoWeb" type="button" onclick="guardarCatalogoWeb()">Guardar <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="hidden" class="form-control form-reset" id="id_catalogo_web" placeholder="Marca" autocomplete="off">
                        <label for="id_catalogo_web"><i class="fas fa-bookmark"></i> Id</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <select id="marca_catalogo_web" name="marca_catalogo_web" class="form-select form-select-lg" aria-label="Default select example"></select>
                        <label for="marca_catalogo_web"><i class="fas fa-bookmark"></i> Marca</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="info_catalogo_web" placeholder="Marca" autocomplete="off">
                        <label for="info_catalogo_web"><i class="fas fa-bookmark"></i> Información</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="url_catalogo_web" placeholder="Titulo" autocomplete="off">
                        <label for="url_catalogo_web"><i class="fas fa-bookmark"></i> Url</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="file-field">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control form-reset" id="img_file_catalogo_web" placeholder="Imagen" autocomplete="off">
                            <label for="img_file_catalogo_web"><i class="fas fa-bookmark"></i> Imagen</label>
                        </div>
                        <input id="imgCatalogoWeb" type="file">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="file-field mb-1" style="top: 50%; transform: translateY(-50%);">
                <figure class="figure">
                    <img class="img_catalogo_web mx-auto d-block img-thumbnail figure-img" src="assets/media/img/loader/PlaceholderWeb.png" onerror="this.src='assets/media/img/loader/PlaceholderWeb.png';" style="width: 310px; height: 160px;">
                    <figcaption class="figure-caption">Tamaño: 300 x 160 pixeles</figcaption>
                </figure>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-secondary" id="btn-ver-catalogoWeb" onclick="verCatalogoWeb()" type="button" data-bs-toggle="modal" data-bs-target="#modalCatalogoWeb">Vista Previa <i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-danger" type="button" onclick="limpiarCatalogoWeb()">Limpiar Formulario <i class="fas fa-eraser"></i></button>
                    </div>
                </div>
                <div class="col-6" style="font-size: 1.5rem;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckBoxCatalogoWeb" name="CheckBoxCatalogoWeb" value="Y">
                        <label class="form-check-label" for="CheckBoxCatalogoWeb">Visible</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCatalogoWeb" tabindex="-1" aria-labelledby="modalLabelCatalogoWeb" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content" style="background-color: #fff;">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelCatalogoWeb">Vista Prevía</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="justify-content-center align-items-center">
                        <div class="col-12 mb-3">
                            <div class="card h-100 overflow-hidden rounded shadow-lg">
                                <img src='' class="card-img-top imagen" id="modalImgCatalogoWeb" alt="">
                                <div class="card_body h-100 card_catalogos">
                                    <div class="card_center">
                                        <h6 class="card_title mitr text-center" id="modalNombreCatalogoWeb"></h6>
                                        <p class="card-text text_small text-center" id="modalInfoCatalogoWeb"></p>
                                        <a style="width: 100%;" class="btn btn-sm btn-danger small" id="modalUrlCatalogoWeb" href="" target="_blank" role="button"><i class="fas fa-link"></i> Ver Online</a>
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