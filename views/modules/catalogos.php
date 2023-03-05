<div class="content-wrapper">

    <section class="content-header">
        <h1>Mantenimiento de Catálogos</h1>
    </section>

    <section class="content">
        <div class="box">
            <div id="catalog">
                <div id="select">
                    <label>Nombre del Catálogo</label>

                    <select class="selectpicker" name="nombreCatalogo" id="nombreCatalogo">
                        <option value="default" selected>-- Seleccione un catálogo --</option>

                        <?php 
                            $catalogs = CatalogsController::getCatalogs();

                            foreach ($catalogs as $key => $value) {
                                echo '<option value="'.$value['NmFisCat'].'">'.$value['DsCatal'].'</option>';
                            }
                        ?> 
                    </select>

                </div>
                <div class="clearfix"></div>

                <!-- Mantto  -->
                <div class="mantto border-title">
                    <h1><span>Mantto</span></h1>

                    <div class="mantto-header">
                        <div class="form-group row">
                            <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="descripcion" placeholder="Ingrese el dato" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="data border-title">
                        <h1><span>Datos</span></h1>

                        <div class="tablita" id="tablita">
                            <table class="table table-bordered dt-responsive table-hover" id="boney">
                                <thead class="table-head">
                                    <tr>
                                        <th scope="col">Clave</th>
                                        <th scope="col">Descripción</th>
                                    </tr>
                                </thead>

                                <tbody id="datosCatalog"></tbody>

                                <tfoot></tfoot>
                            </table>
                        </div>

                    </div>
                </div>

                <!-- Tareas -->
                <div class="tareas border-title">
                    <h1><span>Tareas</span></h1>

                    <div class="btn-row">
                        <button class="btn btn-tareas btn-primary" id="nuevo" disabled>Nuevo</button>
                    </div>

                    <div class="btn-row">
                        <button class="btn btn-tareas btn-primary" id="eliminar" disabled>Eliminar</button>
                    </div>

                    <div class="btn-row">
                        <button class="btn btn-tareas btn-primary" id="modificar" disabled>Modificar</button>
                    </div>

                    <div class="btn-row">
                        <button class="btn btn-tareas btn-primary" id="cancelar" disabled>Cancelar</button>
                    </div>

                    <div class="btn-row">
                        <button class="btn btn-tareas btn-primary" id="regresar" disabled>Salir/Regresar</button>
                    </div>

                </div>

                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SERVER_URL?>views/js/catalogs.js"></script>