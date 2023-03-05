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
                <div class="modal-content pl-3 pr-3">
                    <form method="post" id="users_form">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar asistente o doctor</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <input type="text" class="form-control mt-2 mb-2" name="id_card" id="id_card" aria-describedby="helpId" placeholder="Cédula">
                                <input type="text" class="form-control mt-2 mb-2" name="name" id="name" aria-describedby="helpId" placeholder="Nombre completo">
                                <input type="text" class="form-control mt-2 mb-3" name="last_name" id="last_name" aria-describedby="helpId" placeholder="Apellido paterno, Apellido Materno">
                                <hr>
                                <input type="text" class="form-control mt-3 mb-2" name="address" id="address" aria-describedby="helpId" placeholder="Dirección">
                                <input type="text" class="form-control mt-2 mb-2" name="phone" id="phone" aria-describedby="helpId" placeholder="Teléfono">
                                <input type="text" class="form-control mt-2 mb-2" name="email" id="email" aria-describedby="helpId" placeholder="Correo">
                                <input type="text" class="form-control mt-2 mb-2" name="password" id="password" aria-describedby="helpId" placeholder="Contraseña">
                                <select class="form-control mt-2 mb-2" id="profile">
                                    <option value="1">Asistente</option>
                                    <option value="2">Doctor</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="button_submit">Guardar</button>
                        </div>

                    </form>
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

<script type="text/javascript" src="<?php echo SERVER_URL ?>views/js/users.js"></script>