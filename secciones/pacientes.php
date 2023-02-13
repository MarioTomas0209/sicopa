<?php include('../templates/header.php'); ?>

    <div class="mt-3 buscador">
        <h2>Pacientes</h2>

        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="mt-5 mb-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Agregar
    </button>

    <div class="mt-3 card">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar paciente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
                </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Número de paciente</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Bajo tratamiento médico</th>
                            <th>Motivos de consulta</th>
                            <th>Situación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row">1</td>
                            <td>Mario Adolfo</td>
                            <td>Tomas Roblero</td>
                            <td>El arenal</td>
                            <td>1234566</td>
                            <td>Si</td>
                            <td>Ortodoncia</td>
                            <td>Los dientes bien chuecos</td>
                            <td>Editar | Eliminar</td>
                        </tr>

                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

<?php include('../templates/footer.php'); ?>