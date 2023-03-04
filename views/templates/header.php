<header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="container-fluid">

            <a class="logo navbar-brand" href="main">SICOPA</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="sesion">
                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Servicios
                            </a>

                            <ul class="dropdown-menu espacio" aria-labelledby="navbarScrollingDropdown">

                                <?php
                                $services = ServicesController::getServices();

                                foreach ($services as $key => $value) {
                                    echo '<li><a class="dropdown-item text-uppercase" href="#">' . $value['DsServicio'] . '</a></li>';
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Citas</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="pacientes">Pacientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="citas">Citas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="usuarios">Usuarios</a>
                        </li>
                    </ul>

                    <div class="d-flex gap-4">
                        <div class="dropdown">
                            <a class="nav-link" id="mtto" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Mtto
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="mtto">
                                <li><a class="dropdown-item" href="catalogos">Catalogos</a></li>
                                <li><a class="dropdown-item" href="datos-personales">Datos personales</a></li>
                                <li><a class="dropdown-item" href="#">Usuarios</a></li>
                                <li><a class="dropdown-item" href="#">Cambiar contraseña</a></li>
                                <li><a class="dropdown-item" href="#">Asignación de privilegios</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <?php
                            if (isset($_SESSION['usuario'])) {
                                echo '
                                <a class="nav-link" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">'
                                    . $_SESSION["nombre"] . ' ' . $_SESSION["apellidos"] . '
                                </a>
                                <ul class="dropdown-menu espacio" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item" href="salir">Salir</a></li>
                                </ul>
                            
                                ';
                            } else {
                                echo '
                                <a class="nav-link" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Iniciar sesión
                                </a>
                                <ul class="dropdown-menu espacio" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item" href="login/paciente">Paciente</a></li>
                                    <li><a class="dropdown-item" href="login/doctor">Doctor</a></li>
                                </ul>
                                ';
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </nav>
</header>