<?php
// if ($_SESSION['usuario'] == 'paciente') {
//     echo '<script>window.location = "main"</script>';
// }
?>


<section class="container">
    <div class="mt-3 buscador">
        <h2>Usuarios</h2>

        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>

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
        <!-- /end of Modal -->

        <div class="card-header">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped dt-responsive tablaCategorias mt-4" width="100%" id="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Perfil</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $users = UsersController::getUsers();

                        foreach ($users as $key => $user) {
                            echo "
                                <tr>
                                    <td>{$user['nombre']}</td>
                                    <td>{$user['apellidos']}</td>
                                    <td>{$user['direccion']}</td>
                                    <td>{$user['telefono']}</td>
                                    <td>{$user['email']}</td>
                                    <td>{$user['perfil']}</td>
                                    <td>
                                        <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                                            <button type='button' class='btn btn-warning'><i class='bi bi-pencil-fill text-white'></i></button>
                                            <button type='button' class='btn btn-danger'><i class='bi bi-x-lg'></i></button>
                                        </div>
                                    </td>
                                </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>