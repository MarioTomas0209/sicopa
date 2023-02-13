<?php

$url_base = 'http://localhost/consultorio/';

?>

<!doctype html>
<html lang="en">

<head>
  <title>SICOPA</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="../css/estilos.css">

</head>

<body>
    <header>
        <!-- place navbar here -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="container-fluid">

                <a class="logo navbar-brand" href="<?php echo $url_base; ?>index.php">SICOPA</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="<?php echo $url_base; ?>index.php">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base; ?>secciones/pacientes.php">Pacientes</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base; ?>secciones/citas.php">Citas</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base; ?>secciones/usuarios.php">Usuarios</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base; ?>secciones/usuarios.php">Cerrar sesión</a>
                        </li>
                    </ul>
                </div>

            </div>

        </nav>
    </header>

  <main class="container">