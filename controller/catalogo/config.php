<fieldset class="border p-2 bg-white shadow-lg">
    <legend class="w-auto"><b>Catálogo:</b></legend>

    <div class="row">
        <div class="col-8">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book-open"></i></span>
                <select id="formCatalogo" name="formCatalogo" class="form-select form-select-lg" aria-label="Default select example" onchange="getCatalogo();"></select>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-secondary" id="btn-crear-catalogo" type="button" onclick="nuevoCatalogo()">Nuevo <i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-danger" id="btn-guardar-catalogo" type="button" onclick="guardarCatalogo()">Guardar <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="hidden" class="form-control form-reset" id="id_catalogo" placeholder="Id" autocomplete="off">
                        <label for="id_catalogo"><i class="fas fa-bookmark"></i> Id</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-1">
                        <select id="marca_catalogo" name="marca_catalogo" class="form-select form-select-lg" aria-label="Default select example"></select>
                        <label for="marca_catalogo"><i class="fas fa-bookmark"></i> Marca</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="titulo_catalogo" placeholder="Titulo" autocomplete="off">
                        <label for="titulo_catalogo"><i class="fas fa-bookmark"></i> Titulo</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="subtitulo_catalogo" placeholder="Subtitulo" autocomplete="off">
                        <label for="subtitulo_catalogo"><i class="fas fa-bookmark"></i> Subtitulo</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="fecha_catalogo" placeholder="Fecha Catálogo" autocomplete="off">
                        <label for="fecha_catalogo"><i class="fas fa-bookmark"></i> Fecha Catálogo</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="file-field">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control form-reset" id="img_catalogo" placeholder="Imagen" autocomplete="off">
                            <label for="img_catalogo"><i class="fas fa-bookmark"></i> Imagen</label>
                        </div>
                        <input id="imgCatalogo" type="file">
                    </div>
                </div>
                <div class="col-6">
                    <div class="file-field">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control form-reset" id="archivo_catalogo" placeholder="Archivo" autocomplete="off">
                            <label for="archivo_catalogo"><i class="fas fa-bookmark"></i> Archivo</label>
                        </div>
                        <input id="InputFileArchivo" type="file">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <textarea class="form-control form-reset" placeholder="Etiquetas" id="textareaCatalogo" style="height: auto;"></textarea>
                        <label for="textareaCatalogo"><i class="fas fa-bookmark"></i> Etiquetas</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="file-field mb-1">
                <figure class="figure">
                    <img class="Img-Catalogo mx-auto d-block img-thumbnail figure-img" src="assets/media/img/loader/Placeholder.png" onerror="this.src='assets/media/img/loader/Placeholder.png';" style="width: 200px; height: 275px;">
                    <figcaption class="figure-caption">Tamaño: 200 x 275 pixeles</figcaption>
                </figure>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-secondary" id="btn-ver-catalogo" onclick="verCatalogo()" type="button" data-bs-toggle="modal" data-bs-target="#modalCatalogo">Vista Previa <i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-danger" type="button" onclick="limpiarCatalogo()">Limpiar Formulario <i class="fas fa-eraser"></i></button>
                    </div>
                </div>
                <div class="col-6" style="font-size: 1.5rem;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckBoxCatalogo" name="CheckBoxCatalogo" value="Y">
                        <label class="form-check-label" for="CheckBoxCatalogo">Visible</label>
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
                            <img class='rounded modalImgCatalogo' src="">
                            <div class='cards-desc rounded'>
                                <div class='cards-div'>
                                    <h4 class='mitr' id="modalTituloCatalogo"></h4>
                                    <h6 class='glacial small' id="modalSubtituloCatalogo"></h6>
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