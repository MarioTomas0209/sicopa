<section class="container">

    <!-- Modal add new user -->
    <div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="add_data_user" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content pl-3 pr-3">

                <form method="post">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="add_data_user"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div>
                            <select name="nameUser" id="nameUser" class="form-control">
                                <option value="0" class="default">-- Seleccione un registro --</option>
                                <?php
                                $people = ControllerUsuarios::getPeople();
                                foreach ($people as $key => $value) {
                                    echo '<option class="" value="' . $value['CvPerson'] . '">' . $value['DsNombre'] . ' ' . $value['DsApePat'] . ' ' . $value['DsApeMat'] . ', ' . $value['DsTipPerson'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mt-3">
                            <input type="text" id="Login" placeholder="Ingrese un login" class="form-control">
                        </div>

                        <div class="mt-3">
                            <input type="password" id="Password" placeholder="Ingrese una contraseña" class="form-control" style="width: 100% !important;">
                        </div>

                        <button id="eye" class="btn btn-primary btn-sm mt-2" type="button">Ver contraseña</button>

                        <hr>
                        <!-- Fec Ini & Fec Fin -->
                        <div class="select-tip-perso v-er" style="margin-bottom: 15px;">
                            <div class="form-inline">
                                <label style="margin-right: 40px;">Fecha de Inicio:</label>
                                <input id="FecIni" type="date" class="form-control" onkeydown="return false">
                            </div>
                        </div>

                        <div class="select-tip-perso v-er" style="margin-bottom: 20px;">
                            <div class="form-inline">
                                <label>Fecha de Termino:</label>
                                <input type="date" id="FecFin" class="form-control" onkeydown="return false">
                            </div>
                        </div>

                        <div class="mt-2">
                            <b>Estado de la Cuenta:</b>
                            <input type="checkbox" id="EdoCta">
                        </div>
                    </div>
                </form>

                <input type="hidden" id="action_modal" value="add_user">
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="save_new_user">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /end of Modal -->

    <div class="mt-3 card">
        <div class="card-header d-flex justify-content-center gap-4">
            <button type="button" class="btn btn-success" id="nuevo" data-bs-toggle="modal" data-bs-target="#add_user"><i class="bi bi-plus-lg"></i> Nuevo</button>
            <button type="button" class="btn btn-danger" id="eliminar"><i class="bi bi-trash"></i> Eliminar</button>
            <button type="button" class="btn btn-warning" id="modificar"><i class="bi bi-pencil-square"></i> Modificar</button>
            <button type="button" class="btn btn-secondary" id="cancelar"><i class="bi bi-x-lg"></i> Cancelar</button>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="columna">CvUser</th>
                            <th class="columna">Nombre</th>
                            <th class="columna">Login</th>
                            <th class="columna">Password</th>
                            <th class="columna">FecIni</th>
                            <th class="columna">FecFin</th>
                            <th class="columna">EdoCta</th>
                        </tr>
                    </thead>

                    <tbody id="UsersTable">
                        <?php
                        $users = ControllerUsuarios::getUsers();
                        foreach ($users as $key => $value) {
                            echo "
                                    <tr class='filasTablita' id='{$value['CvUser']}' onclick='selectRow(this.id);'>
                                        <td>{$value['CvUser']}</td>
                                        <td id='NombreUser'>{$value['CvPerson']}</td>
                                        <td>{$value['Login']}</td>
                                        <td>**********</td>
                                        <td>{$value['FecIni']}</td>
                                        <td>{$value['FecFin']}</td>";

                            echo
                            $value['EdoCta'] == 1 ?
                                '<td><b class="text-success">Activado</b></td>' :
                                '<td><b class="text-danger">Desactivado</b></td>';
                            '</tr>';
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="card card-footer mt-4 rounded text-center">
        <p class="m-0">Designed and Developed by <b class="text-danger">Devs</b><b class="text-primary">Web</b> &copy;</p>
    </div>

</section>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SERVER_URL ?>views/js/usuarios.js"></script>

<script>enableComponents(false)</script>