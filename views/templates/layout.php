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

    <link rel="stylesheet" href="<?php echo SERVER_URL ?>views/css/estilos.css">
    <link rel="stylesheet" href="<?php echo SERVER_URL ?>views/css/table.responsive.css">
    <?php 
        if (isset($_GET["ruta"])) {
            $ruta = $_GET['ruta'];
            if ($ruta == "usuarios") {
                echo '<link rel="stylesheet" href="'.SERVER_URL.'views/css/tailwind.min.css" media="screen,projection">';
            }
        }
    ?>
</head>

<body>
    <?php
    
    session_start();

    if (isset($_GET["ruta"])) {

        $ruta = $_GET['ruta'];
        
        if (
            $ruta == "citas" ||
            $ruta == "pacientes" ||
            $ruta == "usuarios" ||
            $ruta == "main" ||
            $ruta == "inicio" ||
            $ruta == "salir"
        ) {
            include 'header.php';
            include "views/modules/{$ruta}.php";
        }

        
        $ruta = explode('/', $ruta);

        if ($ruta[0] == 'login' || $ruta[0] == 'registro' || $ruta[0] == 'eliminar') {
            include "views/modules/{$ruta[0]}.php";
        }
        
    } else {
        include 'header.php';
        include "views/modules/main.php";
    }

    include 'footer.php';

    ?>
</body>