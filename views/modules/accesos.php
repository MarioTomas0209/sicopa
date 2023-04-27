<section class="container">
    <div class="mt-3 buscador d-flex justify-content-center">
        <h2 class="text-center">Mantenimiento de Accesos</h2>
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

        <div class="card-body" style="width: 90%; margin: 0px auto;">
            <div class="users-access row justify-content-around pt-4 pb-4">
                <div class="without-access col-sm-4 border">
                    <h4 class="text-center border-bottom">Usuarios</h4>
                    <ul class="list-users">
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                    </ul>
                </div>

                <div class="access col-sm-2 row">
                    <button type="button"><i class="bi bi-arrow-right"></i></button>
                    <button type="button"><i class="bi bi-arrow-right"></i> &nbsp; <i class="bi bi-arrow-right"></i></button>
                    <button type="button"><i class="bi bi-arrow-left"></i></button>
                    <button type="button"><i class="bi bi-arrow-left"></i> &nbsp; <i class="bi bi-arrow-left"></i></button>
                </div>

                <div class="with-access col-sm-4 border">
                    <h4 class="text-center border-bottom">Usuarios seleccionados</h4>
                    <ul class="list-users">
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                    </ul>
                </div>
            </div>
            
            <!-- Access -->
            <div class="allow-users-access row justify-content-around pt-4 pb-4 mt-4">
                <div class="with-access col-sm-4 border">
                    <h4 class="text-center border-bottom">Accesos</h4>
                    <ul class="list-users">
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                    </ul>
                </div>

                <div class="access col-sm-2 row">
                    <button type="button"><i class="bi bi-caret-right-fill"></i></button>
                    <button type="button"><i class="bi bi-caret-right-fill"></i><i class="bi bi-caret-right-fill"></i></button>
                    <button type="button"><i class="bi bi-caret-left-fill"></i></button>
                    <button type="button"><i class="bi bi-caret-left-fill"></i><i class="bi bi-caret-left-fill"></i></button>
                </div>

                <div class="with-access col-sm-4 border">
                    <h4 class="text-center border-bottom">Accesos seleccionados</h4>
                    <ul class="list-users">
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                        <li><span>Fernando Galicia</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card-footer text-center">
            <p class="m-0">Designed and Developed by <b class="text-danger">Devs</b><b class="text-primary">Web</b> &copy;</p>
        </div>

    </div>

</section>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SERVER_URL ?>views/js/catalogs.js"></script>