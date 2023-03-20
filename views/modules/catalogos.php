<section class="container">
    <div class="mt-3 buscador">
        <h2>Mantenimiento de Catálogos</h2>

        <div class="catalogs">
            <select class="form-control" name="nombreCatalogo" id="nombreCatalogo" style="height: 90%;">
                <option value="default" selected>-- Seleccione un catálogo --</option>

                <?php
                $catalogs = CatalogsController::getCatalogs();

                foreach ($catalogs as $key => $value) {
                    echo '<option value="' . $value['NmFisCat'] . '">' . $value['DsCatal'] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>

    <div class="mt-3 card">

        <!-- Modal add data in Catalog -->
        <div class="modal fade" id="add_data" tabindex="-1" aria-labelledby="add_data_catalog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content pl-3 pr-3">
                    <form method="post" id="">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="add_data_catalog">Insertar dato</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <input type="text" class="form-control mt-2 mb-2" id="catalog_data" placeholder="Ingrese el dato">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="save_data_modal">Guardar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /end of Modal -->
        <!-- Modal Edit data -->
        <div class="modal fade" id="edit_data" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content pl-3 pr-3">
                    <form method="post" id="">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editLabel">Editar dato</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <input type="text" class="form-control mt-2 mb-2" id="edit_data_field" placeholder="Ingrese el dato">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="edit_catalog">Guardar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /end of Modal -->


        <div class="card-header d-flex justify-content-center gap-4">
            <button type="button" class="btn btn-success" id="nuevo" data-bs-toggle="modal" data-bs-target="#add_data" disabled><i class="bi bi-plus-lg"></i> Nuevo</button>
            <button type="button" class="btn btn-danger" id="eliminar"><i class="bi bi-trash"></i> Eliminar</button>
            <button type="button" class="btn btn-warning" id="modificar" data-bs-toggle="modal" data-bs-target="#edit_data"><i class="bi bi-pencil-square"></i> Modificar</button>
            <button type="button" class="btn btn-secondary" id="cancelar"><i class="bi bi-x-lg"></i> Cancelar</button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped dt-responsive tablaCategorias mt-4" width="100%" id="table">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>

                    <tbody id="datosCatalog"></tbody>
                </table>
            </div>
        </div>

        <div class="card-footer text-center">
            <p class="m-0">Designed and Developed by <b class="text-danger">Devs</b><b class="text-primary">Web</b> &copy;</p>
        </div>

    </div>

</section>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SERVER_URL ?>views/js/catalogs.js"></script>