<div class="container">

    <div class="mt-3 mb-5">
        <h2>Mantenimiento de Datos Personales</h2>
    </div>

    <section class="row">

        <!-- Container principal -->
        <div class="row mb-5">

            <div class="col-md-6 col-sm-12">
                
                <label for="tipPerson" class="form-label">Tipo de persona</label>
                <select  name="TipPerson" id="TipPerson" aria-label="Default select example" class="form-select">
                
                    <option value="0" class="option" disabled selected>Seleccione una opción</option>

                    <?php 
                        $TipPerson = ControllerPersonalData::getTipPerson();
                        
                        foreach ($TipPerson as $key => $value) {
                            echo '<option class="option" value="'.$value['CvTipPerson'].'">'.$value['DsTipPerson'].'</option>';
                        }
                    ?>  

                </select>

                <div id="TipPersonError" class="alert-danger msg-error">Selecciona un tipo de persona</div>
            </div>

            <div class="col-md-6 col-sm-12 text-center" role="group" aria-label="Basic mixed styles example">
                <h4>Tareas</h4>
                <button type="button" class="btn btn-primary" id="nuevo">Nuevo</button>
                <button type="button" class="btn btn-danger" id="eliminar">Eliminar</button>
                <button type="button" class="btn btn-info" id="modificar">Modificar</button>
                <button type="button" class="btn btn-success" id="cancelar">Cancelar</button>
                <button type="button" class="btn btn-warning" id="salir">Salir/Regresar</button>
            </div>

        </div>

        <div id="box-com">
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

                        <div id="CurpError" class="alert-danger msg-error">Ingrese una CURP valida</div>
                    
                    </div>

                    <!-- Input RFC -->
                    <div class="componentes">

                        <label class="form-label">RFC</label>

                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-file-earmark"></i></i></span>
                            <input name="rfc" id="rfc" placeholder="Opcional*" class="form-control" type="text" maxlength="13" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                    
                        <div id="RfcError" class="alert-danger msg-error">Ingrese una Rfc valida</div>
                    </div>

                    <!-- Input Email -->
                    <div class="componentes" style="margin-bottom: 10px;">

                        <label class="form-label">E-mail</label>

                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-envelope-at"></i></span>
                            <input name="email" id="email" placeholder="example@mail.com" class="form-control" type="email" required>
                        </div>
                        <div id="EmailError" class="alert-danger msg-error">Ingrese un correo valido</div>
                    
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
                                        echo '<option class="option" value="'.$value['CvNombre'].'">'.$value['DsNombre'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div id="NombreError" class="alert-danger msg-error">Selecciona un nombre</div>
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
                                        echo '<option class="option" value="'.$value['CvApellido'].'">'.$value['DsApellido'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    
                        <div id="ApePatError" class="alert-danger msg-error">Selecciona un apellido</div>
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
                                        echo '<option class="option" value="'.$value['CvApellido'].'">'.$value['DsApellido'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    
                        <div id="ApeMatError" class="alert-danger msg-error">Selecciona un apellido</div>
                    
                    </div>

                    <br><br><br><br>

                    <!-- Input FecNac -->
                    <div class="componentes">
                        <label class="form-label">Fecha de Nacimiento</label>

                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-calendar4"></i></span>
                            <input name="fecha" id="fecha" class="form-control" type="date" required>
                        </div>
                    
                        <div id="DateError" class="alert-danger msg-error">Ingrese una fecha correcta</div>
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
                                        echo '<option class="option" value="'.$value['CvGenero'].'">'.$value['DsGenero'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    
                        <div id="GeneroError" class="alert-danger msg-error">Selecciona un género</div>
                    
                    </div>
                    <!-- Input Teléfono -->
                    <div class="componentes">
                        <label class="form-label">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-addon my-2 mx-2"><i class="bi bi-telephone"></i></span>
                            <input name="telefono" id="telefono" placeholder="Requerido*" class="form-control" type="text" maxlength="10" pattern="\x2b[0-9]+" required>
                        </div>
                        <div id="TelefonoError" class="alert-danger msg-error">Introduce un telefono</div>
                    
                    </div>
                    
                    <br><br><br><br>

                </fieldset>

                <br>

                <!-- Mantto Datos Personales | Dirección -->
                <fieldset class="border p-2 content-personal">

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
                                        echo '<option class="option" value="'.$value['CvEstado'].'">'.$value['DsEstado'].'</option>';
                                    }
                                ?>

                            </select>
                        </div>
                        
                        <div id="EstadoError" class="alert-danger msg-error">Selecciona un estado</div>
                        
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
                                        echo '<option class="option" value="'.$value['CvMunicipio'].'">'.$value['DsMunicipio'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div id="MunicipioError" class="alert-danger msg-error">Selecciona un municipio</div>
                        
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
                                        echo '<option class="option" value="'.$value['CvColonia'].'">'.$value['DsColonia'].'</option>';
                                    }
                                ?>

                            </select>
                        </div>
                        
                        <div id="ColoniaError" class="alert-danger msg-error">Selecciona una colonia</div>
                        
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
                                        echo '<option class="option" value="'.$value['CvCalle'].'">'.$value['DsCalle'].'</option>';
                                    }
                                ?> 

                            </select>
                        </div>
                        
                        <div id="CalleError" class="alert-danger msg-error">Selecciona una calle</div>
                        
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

                        <div id="CpError" class="alert-danger msg-error">Ingrese un Código Postal</div>
                        
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
                        <tbody>
                            <?php 
                                $data = ControllerPersonalData::getDataTable();

                                foreach ($data as $key => $value) {
                                    echo '
                                        <tr class="filasTablita" id="'.$value['CvPerson'].'" onclick="selectRow(this.id);">
                                            <td>'.$value['Nombre'].'</td>
                                            <td>'.$value['ApePat'].'</td>
                                            <td>'.$value['ApeMat'].'</td>
                                            <td>'.$value['FecNac'].'</td>
                                            <td>'.$value['Estado'].'</td>
                                            <td>'.$value['Municipio'].'</td>
                                            <td>'.$value['Colonia'].'</td>
                                            <td>'.$value['Calle'].'</td>
                                            <td>'.$value['Numero'].'</td>
                                            <td>'.$value['Cp'].'</td>
                                        </tr>
                                    ';    
                                }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
  
    </section>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SERVER_URL?>views/js/datperson.js"></script>