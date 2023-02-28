<?php

require_once 'C:/xampp/htdocs/sicopa/models/connection.php';

$message = '';

if( !empty($_POST['nombre']) &&
 !empty($_POST['apellidos']) && 
 !empty($_POST['fec_nac']) && 
 !empty($_POST['email']) && 
 !empty($_POST['sexo']) && 
 !empty($_POST['direccion']) && 
 !empty($_POST['password']) ) {

    $sql = "INSERT INTO paciente (nombre, apellidos, fec_nac, email, sexo, direccion, password) VALUES (:nombre, :apellidos :fec_nac, :email, :sexo, :direccion, :password)";

    $stmt = Conexion::conectar()-> prepare($sql);
    $stmt->bindParam( ':nombre', $_POST['nombre'] );
    $stmt->bindParam( ':apellidos', $_POST['apellidos'] );
    $stmt->bindParam( ':fec_nac', $_POST['fec_nac'] ); 
    $stmt->bindParam( ':email', $_POST['email'] );
    $stmt->bindParam( ':sexo', $_POST['sexo'] );
    $stmt->bindParam( ':direccion', $_POST['direccion'] );
    
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    $stmt->execute();
}

?>


<div class="wrapper">
    <div class="container main">
        <div class="row card-login">
            <div class="col-md-6 side-image">
                <img src="views/img/login.svg" class="img-fluid img-login rounded-top" alt="">
                <div class="text">
                    <a class="logo navbar-brand" href="site">SICOPA</a>
                </div>
            </div>
            <div class="col-md-6 right">

                <form action="registro" method="post">

                    <div class="input-box">
                        <header>REGISTRATE</header>
                        <div class="mb-3">
                            <!-- <label for="" class="form-label">Nombre</label> -->
                            <input type="text" class="form-control mt-3 mb-3" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
                    
                            <!-- <label for="" class="form-label">Apellido Paterno</label> -->
                            <input type="text" class="form-control mt-3 mb-3" name="apellidos" id="" aria-describedby="helpId" placeholder="Apellidos">

                            <input type="text" class="form-control mt-3 mb-3" name="direccion" id="" aria-describedby="helpId" placeholder="Dirección">
                    
                            <!-- <label for="" class="form-label">Fecha de nacimiento</label> -->
                            <input type="date" class="form-control mt-3 mb-3" name="fec_nac" id="" aria-describedby="helpId" placeholder="Fecha">
                    
                            <select name="sexo" class="form-control mt-3 mb-3">
                                <option value="1">-- Seleccione un género --</option>
                                <option value="2">Hombre</option>
                                <option value="3">Mujer</option>
                                <option value="4">No me identifico con ningún género</option>
                            </select>
                    
                        </div>
                        <hr> <!-- ---------- -->
                        <div class="mb-3">
                            <!-- <label for="" class="form-label">Correo</label> -->
                            <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="Correo">
                        </div>
                        <div class="mb-3">
                            <!-- <label for="" class="form-label">Contraseña</label> -->
                            <input type="text" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Contraseña">
                        </div>
                        <div class="input-field">

                            <input name="" id="registrarse" class="btn btn-primary" type="submit" value="Registrate">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>