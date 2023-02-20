<!doctype html>
<html lang="en">

<head>
    <title>SICOPA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>
    <?php

    

    if (isset($_GET["ruta"])) {

        if($_GET["ruta"] == "login" || $_GET["ruta"] == "registro" || $_GET["ruta"] == "loginDoctor"){
            include "modules/" . $_GET["ruta"] . ".php";
        }

        if( $_GET["ruta"] == "site"){
            include "modules/" . $_GET["ruta"] . ".php";
        }

        if ($_GET["ruta"] == "citas" || $_GET["ruta"] == "pacientes" || $_GET["ruta"] == "usuarios") {
            include 'header.php';
            include "modules/" . $_GET["ruta"] . ".php";
        }
        
        if ($_GET["ruta"] == "main" || $_GET["ruta"] == "inicio") {
            include 'header.php';
            include "templates/" . $_GET["ruta"] . ".php";
        }
    } else {
        include "templates/main.php";
    }

    include 'footer.php';

    ?>
</body>