<fieldset class="border p-2 bg-white shadow-lg">
    <legend class="w-auto"><b>Productos:</b></legend>

    <div class="row">
        <div class="col-8">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book-open"></i></span>
                <select id="formProductos" name="formProductos" class="form-select form-select-lg" aria-label="Default select example" onchange="getProductos();"></select>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-secondary"  type="button" onclick="nuevoProducto()">Nuevo <i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-danger" id="btn-guardar-marcas" type="button" onclick="guardarProductos()">Guardar <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="hidden" class="form-control form-reset" id="id_productos" placeholder="Marca" autocomplete="off">
                        <label for="id_productos"><i class="fas fa-bookmark"></i> Id</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <select id="sistema_linea" name="sistema_linea" class="form-select form-select-lg" aria-label="Default select example"></select>
                        <label for="sistema_linea"><i class="fas fa-bookmark"></i> Sistema</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <select id="marca_linea" name="marca_linea" class="form-select form-select-lg" aria-label="Default select example"></select>
                        <label for="marca_linea"><i class="fas fa-bookmark"></i> Marca</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="file-field">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control form-reset" id="img_file_productos" placeholder="Imagen" autocomplete="off">
                            <label for="img_file_productos"><i class="fas fa-bookmark"></i> Imagen</label>
                        </div>
                        <input id="imgProductos" type="file">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <textarea class="form-control form-reset" placeholder="Información del producto" id="info_productos" autocomplete="off" style="height: 100px"></textarea>
                        <label for="info_productos"><i class="fas fa-bookmark"></i> Información del producto</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="file-field mb-1" style="top: 50%; transform: translateY(-50%);">
                <figure class="figure">
                    <img class="img_productos mx-auto d-block img-thumbnail figure-img" src="assets/media/img/loader/PlaceholderWeb.png" onerror="this.src='assets/media/img/loader/PlaceholderWeb.png';" style="width: 310px; height: 160px;">
                    <figcaption class="figure-caption">Tamaño: 300 x 160 pixeles</figcaption>
                </figure>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-secondary" id="btn-ver-marcas" onclick="verModalProductos()" type="button" data-bs-toggle="modal" data-bs-target="#modalMarcas">Vista Previa <i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-danger" type="button" onclick="limpiarProductos()">Limpiar Formulario <i class="fas fa-eraser"></i></button>
                    </div>
                </div>
                <div class="col-6" style="font-size: 1.5rem;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckBoxProductos" name="CheckBoxProductos" value="Y">
                        <label class="form-check-label" for="CheckBoxProductos">Visible</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalMarcas" tabindex="-1" aria-labelledby="modalLabelMarcas" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelMarcas">Vista Prevía</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="mitr" id="modalNombreMarcas">Refaccionaria Arboledas</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-12 mb-2">
                                    <img class="mx-auto d-block img-thumbnail" id="modalImgProductos" src="assets/media/img/loader/PlaceholderWeb.png" onerror="this.src='assets/media/img/loader/PlaceholderWeb.png';" style="width: 310px; height: 160px;">
                                </div>
                                <div class="col-lg-12 mb-2 text-justify">
                                    <p id="modalInfoMarcas">Refaccionaria Arboledas</p>
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