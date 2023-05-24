<?php 
if (isset($_SESSION['CvUser'])) {
    $isAdmin = false;

    if ($_SESSION['CvUser'] == 1) {
        $isAdmin = true;
    }

    $access_user = AccessController::getAccess($_SESSION['CvUser']);
}
?>

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

                        <?php if (isset($_SESSION['is_login'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="">|</a>
                            </li>

                            <?php if (in_array("SIC10000", $access_user) || $isAdmin) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="catalogos">Catalogos</a>
                            </li>
                            <?php } ?>

                            <?php if (in_array("SIC20000", $access_user) || $isAdmin) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="datos-personales">Datos Personales</a>
                            </li>
                            <?php } ?>

                            <?php if (in_array("SIC30000", $access_user) || $isAdmin) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="usuarios">Usuarios</a>
                            </li>
                            <?php } ?>

                            <?php if (in_array("SIC40000", $access_user) || $isAdmin) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="password">Contraseña</a>
                            </li>
                            <?php } ?>

                            <?php if (in_array("SIC50000", $access_user) || $isAdmin) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="aplicaciones">Aplicaciones</a>
                            </li>
                            <?php } ?>

                            <?php if (in_array("SIC60000", $access_user) || $isAdmin) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="accesos">Accesos</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="">|</a>
                            </li>
                            <?php } ?>

                        <?php } ?>
                        
                    </ul>

                    <div class="d-flex gap-4">
                        <div class="dropdown">
                            <?php
                            if (isset($_SESSION['is_login'])) {
                                echo '
                                <a class="nav-link" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">'
                                    . $_SESSION["nombre"] . ' ' . $_SESSION["apellido"] . '
                                </a>
                                <ul class="dropdown-menu espacio" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item" href="salir">Salir</a></li>
                                </ul>
                            
                                ';
                            } else {
                                echo '<a class="nav-link" href="login">Iniciar sesión</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </nav>
</header>