
<section class="container">
    <div class="mt-3 buscador">
        <h2>Pacientes</h2>
    
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
            <button class="btn btn-success" type="submit">Buscar</button>
        </form>
        
    </div>
    
    <div class="mt-3 card">
        <!-- MODAL -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar paciente</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="registro" method="post">

                            <div class="input-box">

                                <div class="mb-3">

                                    <input type="text" class="form-control mt-3 mb-3" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">

                                    <input type="text" class="form-control mt-3 mb-3" name="apellidos" id="" aria-describedby="helpId" placeholder="Apellidos">

                                    <input type="date" class="form-control mt-3 mb-3" name="fec_nac" id="" aria-describedby="helpId" placeholder="Fecha">

                                    <input type="number" class="form-control mt-3 mb-3" name="tel" id="" aria-describedby="helpId" placeholder="Número de teléfono">

                                    <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="Correo">

                                    <input type="text" class="mt-3 form-control" name="password" id="" aria-describedby="helpId" placeholder="Contraseña">

                                </div>
                                
                            </div>
                            
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>

                            <?php
                    
                            $add = new PatientController();
                            $add -> addPatient();
                
                            ?>

                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    
    
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Agregar
                </button>
            </div>
            <div class="card-body">
    
                <div class="table-responsive">
    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Número de paciente</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Fecha de nacimiento</th>
                                <th>Fecha de registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php

                        $patient = PatientController::getPatient(); 

                        foreach ($patient as $registro) { ?>

                            <tr>

                                <td scope="row"><?php echo $registro['id_paciente']; ?></td>
                                <td><?php echo $registro['nombre']; ?></td>
                                <td><?php echo $registro['apellidos']; ?></td>
                                <td><?php echo $registro['tel']; ?></td>
                                <td><?php echo $registro['email']; ?></td>
                                <td><?php echo $registro['fec_nac']; ?></td>
                                <td><?php echo $registro['fecha_registro']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" class="btn btn-warning">Editar</button>

                                        <a name="eliminar" type="submit" id="btnBorrar" class="btn btn-danger" href="pacientes?txtID=<?php echo $registro['id_paciente']; ?>" role="button">Eliminar</a>

                                        <?php  PatientController::removePatient(); ?>
                                    </div>
                                </td>

                            </tr>
                            
                        <?php } ?>
                            
    
                        </tbody>
                    </table>
    
                </div>
            </div>
        </div>
    
    </div>
</section>