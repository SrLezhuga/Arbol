<fieldset class="border p-2 bg-white shadow-lg">
    <legend class="w-auto"><b>Banner:</b></legend>

    <div class="row">
        <div class="col-8">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book-open"></i></span>
                <select id="formBanner" name="formBanner" class="form-select form-select-lg" aria-label="Default select example" onchange="getBanner();"></select>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-secondary" id="btn-crear-catalogo" type="button" onclick="nuevoBanner()">Nuevo <i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-danger" id="btn-guardar-banner" type="button" onclick="guardarBanner()">Guardar <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="hidden" class="form-control form-reset" id="id_slider" placeholder="Id" autocomplete="off">
                        <label for="id_slider"><i class="fas fa-bookmark"></i> Id</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="file-field">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control form-reset" id="img_pc" placeholder="Imagen" autocomplete="off">
                            <label for="img_pc"><i class="fas fa-bookmark"></i> Imagen Cedis</label>
                        </div>
                        <input id="imgPc" type="file">
                    </div>
                </div>
                <div class="col-6">
                    <div class="file-field">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control form-reset" id="img_movil" placeholder="Imagen" autocomplete="off">
                            <label for="img_movil"><i class="fas fa-bookmark"></i> Logo Cedis</label>
                        </div>
                        <input id="imgMovil" type="file">
                    </div>
                </div>
                <div class="file-field mb-1">
                    <figure class="figure">
                        <img class="Img-PC mx-auto d-block img-thumbnail figure-img" src="assets/media/img/loader/PlaceholderBanner.png" onerror="this.src='assets/media/img/loader/PlaceholderBanner.png';" style="width: 100%; height: 100%;">
                        <figcaption class="figure-caption">Tamaño: 1250 x 500 pixeles</figcaption>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="file-field mb-1">
                <figure class="figure">
                    <img class="Img-MOVIL mx-auto d-block img-thumbnail figure-img" src="assets/media/img/loader/PlaceholderMovil.png" onerror="this.src='assets/media/img/loader/PlaceholderMovil.png';" style="width: 100%; height: 100%;">
                    <figcaption class="figure-caption">Tamaño: 530 x 330 pixeles</figcaption>
                </figure>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-secondary" id="btn-ver-banner" onclick="verCatalogo()" type="button" data-bs-toggle="modal" data-bs-target="#modalCatalogo">Vista Previa <i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-danger" type="button" onclick="limpiarBanner()">Limpiar Formulario <i class="fas fa-eraser"></i></button>
                    </div>
                </div>
                <div class="col-6" style="font-size: 1.5rem;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckBoxBanner" name="CheckBoxBanner" value="Y">
                        <label class="form-check-label" for="CheckBoxBanner">Visible</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

</fieldset>
