<?php $access = new ControllerPersonalData() ?>

<div class="container">

    <div class="mt-3 d-flex justify-content-center gap-5">
        <div class="mt-3 mb-5">
            <h2>Datos Personales</h2>
        </div>

        <div class="mt-3">
            <select name="TipPerson" id="TipPerson" aria-label="Default select example" class="form-select">
                <option value="0" class="option" selected>Seleccione un tipo de persona</option>

                <?php
                $TipPerson = ControllerPersonalData::getTipPerson();

                foreach ($TipPerson as $key => $value) {
                    echo '<option class="option" value="' . $value['CvTipPerson'] . '">' . $value['DsTipPerson'] . '</option>';
                }
                ?>

            </select>
        </div>
    </div>

    <section class="container">

        <div class="card">
            <div class="card-header d-flex justify-content-center gap-4">
                <button type="button" class="btn btn-success <?php echo $access->create ? '' : 'd-none' ?>" id="nuevo"><i class="bi bi-plus-lg"></i> Nuevo</button>
                <button type="button" class="btn btn-danger <?php echo $access->delete ? '' : 'd-none' ?>" id="eliminar"><i class="bi bi-trash"></i> Eliminar</button>
                <button type="button" class="btn btn-warning <?php echo $access->edit ? '' : 'd-none' ?>" id="modificar"><i class="bi bi-pencil-square"></i> Modificar</button>
                <button type="button" class="btn btn-secondary" id="cancelar"><i class="bi bi-x-lg"></i> Cancelar</button>
            </div>
        </div>

        <div class="card-body">
            <!-- Mantto Datos Personales -->
            <form>
                <fieldset class="border p-2">
                    <legend class="float-none w-auto p-2">Datos Personales</legend>

                    <!-- Input CURP -->
                    <div class="componentes">
                        <label class="form-label">CURP</label>

                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-file-earmark"></i></i></span>
                            <input name="curp" id="curp" placeholder="Requerido*" class="form-control" type="text" maxlength="18" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                    </div>

                    <!-- Input RFC -->
                    <div class="componentes">
                        <label class="form-label">RFC</label>

                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-file-earmark"></i></i></span>
                            <input name="rfc" id="rfc" placeholder="Opcional*" class="form-control" type="text" maxlength="13" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                    </div>

                    <!-- Input Email -->
                    <div class="componentes" style="margin-bottom: 10px;">
                        <label class="form-label">E-mail</label>

                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-envelope-at"></i></span>
                            <input name="email" id="email" placeholder="example@mail.com" class="form-control" type="email" required>
                        </div>
                    </div>

                    <br><br><br><br>

                    <!-- Select Name -->
                    <div class="componentes">
                        <label class="form-label">Nombre</label>
                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-person"></i></span>
                            <!-- selectpicker -->
                            <select name="nombre" id="nombre" class="form-select">

                                <option value="0" disabled selected>Seleccione una Opción</option>
                                <?php
                                $names = ControllerPersonalData::getNames();
                                foreach ($names as $key => $value) {
                                    echo '<option class="option" value="' . $value['CvNombre'] . '">' . $value['DsNombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Select ApePat -->
                    <div class="componentes">
                        <label class="form-label">Apellido Paterno</label>
                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-person"></i></i></span>
                            <select name="ApePat" id="ApePat" class="form-select">
                                <option disabled selected value="0">Seleccione una Opción</option>
                                <?php
                                $lastnames = ControllerPersonalData::getLastNames();
                                foreach ($lastnames as $key => $value) {
                                    echo '<option class="option" value="' . $value['CvApellido'] . '">' . $value['DsApellido'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Select ApeMat -->
                    <div class="componentes">
                        <label class="form-label">Apellido Materno</label>
                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-person"></i></i></span>
                            <select name="ApeMat" id="ApeMat" class="form-select">
                                <option disabled selected value="0">Seleccione una Opción</option>
                                <?php
                                $lastnames = ControllerPersonalData::getLastNames();
                                foreach ($lastnames as $key => $value) {
                                    echo '<option class="option" value="' . $value['CvApellido'] . '">' . $value['DsApellido'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <br><br><br><br>

                    <!-- Input FecNac -->
                    <div class="componentes">
                        <label class="form-label">Fecha de Nacimiento</label>

                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-calendar4"></i></span>
                            <input name="fecha" id="fecha" class="form-control" type="date" required>
                        </div>
                    </div>

                    <!-- Select Genero -->
                    <div class="componentes">
                        <label class="form-label">Género</label>
                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-people"></i></span>
                            <select name="genero" id="genero" class="form-select">

                                <option value="0" disabled selected>Seleccione una Opción</option>
                                <?php
                                $genders = ControllerPersonalData::getGenders();
                                foreach ($genders as $key => $value) {
                                    echo '<option class="option" value="' . $value['CvGenero'] . '">' . $value['DsGenero'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Input Teléfono -->
                    <div class="componentes">
                        <label class="form-label">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-telephone"></i></span>
                            <input name="telefono" id="telefono" placeholder="Requerido*" class="form-control" type="text" maxlength="10" pattern="\x2b[0-9]+" required>
                        </div>
                    </div>

                    <br><br><br><br>
                </fieldset>

                <!-- Mantto Datos Personales | Dirección -->
                <fieldset class="border p-2 content-personal mt-2">
                    <legend class="float-none w-auto p-2">Datos Dirección</legend>

                    <!-- Select Estado -->
                    <div class="componentes">
                        <label class="form-label">Estado</label>
                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-house"></i></span>
                            <select name="estado" id="estado" class="form-select">
                                <option value="0" disabled selected>Seleccione una Opción</option>
                                <?php
                                $states = ControllerPersonalData::getStates();

                                foreach ($states as $key => $value) {
                                    echo '<option class="option" value="' . $value['CvEstado'] . '">' . $value['DsEstado'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Select Municipio -->
                    <div class="componentes">
                        <label class="form-label">Municipio</label>
                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-house"></i></span>
                            <select name="municipio" id="municipio" class="form-select">

                                <option value="0" disabled selected>Seleccione una Opción</option>

                                <?php
                                $municipalities = ControllerPersonalData::getMunicipalities();

                                foreach ($municipalities as $key => $value) {
                                    echo '<option class="option" value="' . $value['CvMunicipio'] . '">' . $value['DsMunicipio'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Select Colonia -->
                    <div class="componentes">
                        <label class="form-label">Colonia</label>
                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-house"></i></span>
                            <select name="colonia" id="colonia" class="form-select">

                                <option value="0" disabled selected>Seleccione una Opción</option>

                                <?php
                                $colonies = ControllerPersonalData::getColonies();

                                foreach ($colonies as $key => $value) {
                                    echo '<option class="option" value="' . $value['CvColonia'] . '">' . $value['DsColonia'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <br><br><br><br>
                    <div class="clearfix"></div>

                    <!-- Select Calle -->
                    <div class="componentes">
                        <label class="form-label">Calle</label>
                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-house"></i></span>
                            <select name="calle" id="calle" class="form-select">
                                <option value="0" disabled selected>Seleccione una Opción</option>
                                <?php
                                $streets = ControllerPersonalData::getStreets();
                                foreach ($streets as $key => $value) {
                                    echo '<option class="option" value="' . $value['CvCalle'] . '">' . $value['DsCalle'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Input Numero -->
                    <div class="componentes">
                        <label class="form-label">Número de Casa</label>
                        
                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-fullscreen-exit"></i></span>
                            <input name="numero" id="numero" placeholder="Opcional*" class="form-control" type="text" maxlength="6">
                        </div>
                    </div>

                    <!-- Input Codigo Postal -->
                    <div class="componentes">
                        <label class="form-label">Código Postal</label>
                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-upc-scan"></i></span>
                            <input name="cp" id="cp" placeholder="Requerido*" class="form-control" type="text" maxlength="5" required>
                        </div>
                    </div>

                    <br><br><br><br>
                    <div class="clearfix"></div>
                </fieldset>
            </form>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="columna">Nombre</th>
                                <th class="columna">ApePat</th>
                                <th class="columna">ApeMat</th>
                                <th class="columna">FecNac</th>
                                <th class="columna">Estado</th>
                                <th class="columna">Municipio</th>
                                <th class="columna">Colonia</th>
                                <th class="columna">Calle</th>
                                <th class="columna">Número</th>
                                <th class="columna">CP</th>
                            </tr>
                        </thead>
                        <tbody id="PeopleTable">
                            <?php
                            $data = ControllerPersonalData::getDataTable();

                            foreach ($data as $key => $value) {
                                echo '
                                        <tr class="filasTablita" id="' . $value['CvPerson'] . '" onclick="selectRow(this.id);">
                                            <td>' . $value['Nombre'] . '</td>
                                            <td>' . $value['ApePat'] . '</td>
                                            <td>' . $value['ApeMat'] . '</td>
                                            <td>' . $value['FecNac'] . '</td>
                                            <td>' . $value['Estado'] . '</td>
                                            <td>' . $value['Municipio'] . '</td>
                                            <td>' . $value['Colonia'] . '</td>
                                            <td>' . $value['Calle'] . '</td>
                                            <td>' . $value['Numero'] . '</td>
                                            <td>' . $value['Cp'] . '</td>
                                        </tr>
                                    ';
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
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SERVER_URL ?>views/js/datperson.js"></script>