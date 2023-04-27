<!doctype html>
<html lang="en">

<head>
    <title>Consultorio | SICOPA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="shortcut icon" href="<?php echo SERVER_URL ?>views/img/icono.png" type="image/x-icon">

    <script src="<?php echo SERVER_URL ?>views/plugins/sweetalert2/sweetalert2.all.js"></script>

    <link rel="stylesheet" href="<?php echo SERVER_URL ?>views/css/estilos.css">
    <link rel="stylesheet" href="<?php echo SERVER_URL ?>views/css/mtto.css">
    <link rel="stylesheet" href="<?php echo SERVER_URL ?>views/css/table.responsive.css">
</head>

<body>
    <?php
    
    session_start();

    if (isset($_GET["ruta"])) {

        $ruta = $_GET['ruta'];
        
        if (
            $ruta == "main" ||
            $ruta == "citas" ||
            $ruta == "pacientes" ||
            $ruta == "catalogos" ||
            $ruta == "datos-personales" ||
            $ruta == "usuarios" ||
            $ruta == "password" ||
            $ruta == "seguridad" ||
            $ruta == "aplicaciones" ||
            $ruta == "accesos" ||
            $ruta == "salir"

        ) {
            include 'header.php';
            include "views/modules/{$ruta}.php";
        }

        if ($ruta == 'login') {
            include "views/modules/{$ruta}.php";
        }
        
        $ruta = explode('/', $ruta);
        
    } else {
        include 'header.php';
        include "views/modules/main.php";
    }

    include 'footer.php';

    ?>
</body>

<!-- // Designed and Developed by Francisco Virbes and Mario Adolfo © -->