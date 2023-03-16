<section class="container">
    <div class="mt-3 card">
        <div class="card-header d-flex justify-content-center gap-4">
            <button type="button" class="btn btn-success" id="nuevo"><i class="bi bi-plus-lg"></i> Nuevo</button>
            <!-- <button type="button" class="btn btn-success" id="nuevo">Nuevo</button> -->
            <button type="button" class="btn btn-danger" id="eliminar"><i class="bi bi-trash"></i> Eliminar</button>
            <button type="button" class="btn btn-warning" id="modificar" data-bs-toggle="modal" data-bs-target="#edit_data"><i class="bi bi-pencil-square"></i> Modificar</button>
            <button type="button" class="btn btn-secondary" id="cancelar"><i class="bi bi-x-lg"></i> Cancelar</button>
        </div>
    </div>

    <div class="card-body mt-4">
        <div class="d-flex justify-content-center gap-5">

            <div class="border mt-2 shadow p-3">
                <div>
                    <label style="margin-right: 34px;">Nombre del Usuario:</label>
                    <select name="nameUser" id="nameUser" class="form-control">
                        <option value="0" class="default">Seleccione una Opción</option>
                        <?php
                        $people = ControllerUsuarios::getPeople();
                        foreach ($people as $key => $value) {
                            echo '<option class="" value="' . $value['CvPerson'] . '">' . $value['DsNombre'] . ' ' . $value['DsApePat'] . ' ' . $value['DsApeMat'] . ', ' . $value['DsTipPerson'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="mt-3">
                    <label style="margin-right: 53px;">Login del Usuario:</label>

                    <div>
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" id="Login" placeholder="Ingrese un Login" class="form-control">
                    </div>
                </div>

                <div class="mt-3">
                    <label>Password del Usuario:</label>

                    <div>
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" id="Password" placeholder="Ingrese una Contraseña" class="form-control" style="width: 100% !important;">
                    </div>

                    <button id="eye" class="btn btn-primary btn-sm mt-3">
                        <!-- <i class="fa fa-eye"></i> -->
                        Ver contraseña
                    </button>
                </div>
            </div>


            <!-- Fec Ini & Fec Fin -->
            <div class="mt-2 border shadow p-3">
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
            </div>
        </div>

        <div class="mt-3 mb-2" style="margin: 0 auto; width: 16%;">
            <b>Estado de la Cuenta:</b>
            <input type="checkbox" id="EdoCta">
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
                                        <td>{$value['Login']}'</td>
                                        <td>{$value['FecIni']}'</td>
                                        <td>{$value['FecFin']}'</td>";

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

    <div class="card card-footer mt-4 rounded">
        <p class="m-0">Designed and Developed by <b class="text-danger">Devs</b><b class="text-primary">Web</b> &copy;</p>
    </div>

</section>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SERVER_URL ?>views/js/usuarios.js"></script>

<script>
    enableComponents(false)
</script>