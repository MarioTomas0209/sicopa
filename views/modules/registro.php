<div class="wrapper">
    <div class="container main">
        <div class="row card-login">
            <div class="col-md-6 side-image">
                <img src="views/img/login.svg" class="img-fluid img-login rounded-top" alt="">
                <div class="text">
                    <a class="logo navbar-brand" href="main">SICOPA</a>
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
                    
                            <!-- <label for="" class="form-label">Fecha de nacimiento</label> -->
                            <input type="date" class="form-control mt-3 mb-3" name="fec_nac" id="" aria-describedby="helpId" placeholder="Fecha">
                    
                            <input type="number" class="form-control mt-3 mb-3" name="tel" id="" aria-describedby="helpId" placeholder="Número de teléfono">
                    
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

                    <?php
                    
                        $login = new RegisterController();
                        $login-> ctrRegister();
                    
                    ?>

                </form>

            </div>
        </div>
    </div>
</div>