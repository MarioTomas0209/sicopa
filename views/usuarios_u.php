<div class="content-wrapper">

    <section class="content-header">

        <h1>
            Mantenimiento de Usuarios
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar Usuarios</li>
        </ol>

    </section>

    <section class="content">
        <div class="box">

            <div id="mtto-users">

                <div id="box-com-users">

                    <!-- Mantto Users -->
                    <div class="mantto-dt border-title" style="margin-bottom: 20px; border: 1px solid #ccc;">
                        <h1><span></span></h1>

                        <div class="select-tip-perso v-er" style="margin-bottom: 15px;">
                            <div class="form-inline">
                                <label style="margin-right: 34px;">Nombre del Usuario:</label>
                                <select name="nameUser" id="nameUser" class="form-control field-mtto-user">

                                    <option value="0" class="default"><?php $i=1; while($i<15){echo'&nbsp;';$i++;}?>-- Seleccione una Opción --</option>

                                    <?php
                                        $people = ControllerUsuarios::getPeople();

                                        foreach ($people as $key => $value) {
                                            echo '<option class="" value="'.$value['CvPerson'].'">'.$value['DsNombre'].' '.$value['DsApePat'].' '.$value['DsApeMat'].', '.$value['DsTipPerson'].'</option>';
                                        }
                                    ?>

                                </select>
                            </div>

                            <div id="NombreUsuarioError" class="alert-danger msg-error">Selecciona una de persona</div>
                        </div>

                        <div class="select-tip-perso v-er" style="margin-bottom: 15px;">
                            <div class="form-inline">
                                <label style="margin-right: 53px;">Login del Usuario:</label>

                                <div class="input-group" style="width: 50% !important;">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" id="Login" placeholder="Ingrese un Login" class="form-control field-mtto-user" style="width: 100% !important;">
                                </div>

                            </div>

                            <div id="LoginUsuarioError" class="alert-danger msg-error">Introduzca un Login</div>
                        </div>

                        <div class="select-tip-perso v-er" style="margin-bottom: 20px;">
                            <div class="form-inline">
                                <label>Password del Usuario:</label>
                                
                                <div class="input-group" style="width: 50% !important;">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" id="Password" placeholder="Ingrese una Contraseña" class="form-control field-mtto-user" style="width: 100% !important;">
                                </div>
                                
                                <button id="eye" class="btn btn-primary btn-sm" style="margin-left: 10px;">
                                    <i class="fa fa-eye"></i>
                                </button>

                            </div>

                            <div id="PasswordUsuarioError" class="alert-danger msg-error">Introduce una contraseña</div>
                        </div>

                        <div class="clearfix"></div>
                    </div>

                    <!-- Fec Ini & Fec Fin -->
                    <div class="mantto-dt border-title" style="border: 1px solid #ccc;">
                        <h1><span></span></h1>

                        <div class="select-tip-perso v-er" style="margin-bottom: 15px;">
                            <div class="form-inline">
                                <label style="margin-right: 40px;">Fecha de Inicio:</label>
                                <input id="FecIni" type="date" class="form-control" onkeydown="return false">

                            </div>

                            <div id="FecIniError" class="alert-danger msg-error">Fecha incorrecta</div>
                        </div>

                        <div class="select-tip-perso v-er" style="margin-bottom: 20px;">
                            <div class="form-inline">
                                <label>Fecha de Termino:</label>
                                <input type="date" id="FecFin" class="form-control" onkeydown="return false">

                            </div>
                            
                            <div id="FecFinError" class="alert-danger msg-error">Fecha incorrecta</div>
                        </div>
            
                    </div>

                    <div class="select-tip-perso">
                        <div class="form-inline">
                            <label>Estado de la Cuenta:</label>
                            <input type="checkbox" id="EdoCta">
                        </div>
                    </div>

                </div>

                <!-- Tareas -->
                <div class="tareas border-title" style="width: 17%; margin-top: 1%">
                    <h1><span>Tareas</span></h1>

                    <div class="btn-row">
                        <button class="btn btn-tareas btn-primary" id="nuevo">Nuevo</button>
                    </div>

                    <div class="btn-row">
                        <button class="btn btn-tareas btn-primary" id="eliminar">Eliminar</button>
                    </div>

                    <div class="btn-row">
                        <button class="btn btn-tareas btn-primary" id="modificar">Modificar</button>
                    </div>

                    <div class="btn-row">
                        <button class="btn btn-tareas btn-primary" id="cancelar">Cancelar</button>
                    </div>

                    <br>

                    <div class="btn-row">
                        <button class="btn btn-tareas btn-danger" id="salir">Salir/Regresar</button>
                    </div>
                </div>

                <div class="clearfix"></div>
                <br>

                <div class="tablita table-dt" style="width: 85%;">
                    <table class="table table-bordered dt-responsive table-hover">
                        <thead class="table-head">
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
                                    echo '
                                        <tr class="filasTablita" id="'.$value['CvUser'].'" onclick="selectRow(this.id);">
                                            <td>'.$value['CvUser'].'</td>
                                            <td id="NombreUser">'.$value['CvPerson'].'</td>
                                            <td>'.$value['Login'].'</td>
                                            <td>'.$value['FecIni'].'</td>
                                            <td>'.$value['FecFin'].'</td>';

                                            if ($value['EdoCta'] == 1) {
                                                echo '<td><span class="btn btn-success btn-xs">Activado</span></td>';
                                            } else {
                                                echo '<td><span class="btn btn-danger btn-xs">Desactivado</span></td>';
                                            }
                                    echo'</tr>';
                                }

                            ?>           
                        </tbody>

                        <tfoot></tfoot>
                    </table>    
                </div>
            </div>
            <script>enableComponents(false)</script>
    </section>
</div>

