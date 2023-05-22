<section class="container">
    <div class="mt-3 buscador d-flex justify-content-center">
        <h2 class="text-center">Mantenimiento de Aplicaciones</h2>
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

                            <div class="remind-notation text-center text-muted mb-3">
                                <h6>** Recuerda que la nomenclatura debe ser la siguiente</h5>
                                    <ul class="notation">
                                        <li><b>SIC10000</b> - Nombre del Módulo</li>
                                        <ul>
                                            <li><b>SIC11000</b> - Alta del Módulo</li>
                                            <li><b>SIC12000</b> - Modificación del Módulo</li>
                                            <li><b>SIC13000</b> - Baja del Módulo</li>
                                        </ul>
                                    </ul>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control mt-2 mb-2" id="cv_aplicacion" placeholder="Clave de la aplicación" maxlength="8" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control mt-2 mb-2" id="ds_aplicacion" placeholder="Descripción de la aplicación">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="save_data_app" disabled>Guardar</button>
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
                                <input type="text" class="form-control mt-2 mb-2" id="edit_cv_aplicacion" placeholder="Clave de la aplicación" maxlength="8" onkeyup="this.value = this.value.toUpperCase()" disabled>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control mt-2 mb-2" id="edit_ds_aplicacion" placeholder="Descripción de la aplicación">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="edit_app">Guardar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /end of Modal -->


        <div class="card-header d-flex justify-content-center gap-4">
            <button type="button" class="btn btn-success" id="nuevo" data-bs-toggle="modal" data-bs-target="#add_data"><i class="bi bi-plus-lg"></i> Nuevo</button>
            <button type="button" class="btn btn-danger" id="eliminar" disabled><i class="bi bi-trash"></i> Eliminar</button>
            <button type="button" class="btn btn-warning" id="modificar" data-bs-toggle="modal" data-bs-target="#edit_data" disabled><i class="bi bi-pencil-square"></i> Modificar</button>
            <button type="button" class="btn btn-secondary" id="cancelar" disabled><i class="bi bi-x-lg"></i> Cancelar</button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered dt-responsive tablaCategorias mt-4" width="100%" id="table">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>Clave</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>

                    <tbody id="data_appications">
                        <?php
                        $modules = ApplicationsController::getModulesApp();

                        foreach ($modules as $key => $value) {
                            $key_code = $value[0];
                            $description = $value[1];


                            echo "<tr class='filasTablita' id='$key_code' onclick='seleccionar(this.id);'>
                                    <td>$key_code</td>
                                    <td>$description</td>
                                  </tr>";

                            $subs = substr($key_code, 0, 4);

                            $sub_modules = ApplicationsController::getSubModulesApp($subs);

                            foreach ($sub_modules as $key => $value) {
                                $key_code = $value[0];
                                $description = $value[1];
                                $add_pl = 'style="padding-left: 30px"'; // Add padding left to submodule

                                echo "<tr class='filasTablita' id='$key_code' onclick='seleccionar(this.id);'>
                                        <td $add_pl> - $key_code</td>
                                        <td $add_pl> - $description</td>
                                    </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer text-center">
            <p class="m-0">Designed and Developed by <b class="text-danger">Devs</b><b class="text-primary">Web</b> &copy;</p>
        </div>

    </div>

</section>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SERVER_URL ?>views/js/applications.js"></script>