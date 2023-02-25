<div class="wrapper">
    <div class="container main">
        <div class="row card-login">
            <?php
            if ($ruta[1] == 'paciente') {
                echo '<div class="col-md-6 side-image">';
            } else if ($ruta[1] == 'doctor'){
                echo '<div class="col-md-6 side-image2">';
            } else {
                echo '<script>window.location = "'.SERVER_URL.'"</script>';
            }
            ?>
            <img src="views/img/login.svg" class="img-fluid img-login rounded-top" alt="">
            <div class="text">
                <a class="logo navbar-brand" href="site">SICOPA</a>
            </div>
        </div>
        <div class="col-md-6 right">
            <div class="input-box">
                <header>INICIA SESIÓN</header>

                <?php
                if ($ruta[1] == 'paciente') {
                    echo '
                        <div class="mb-3">
                            <label for="" class="form-label">Correo</label>
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Contraseña</label>
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                        </div>

                        <div class="input-field">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>

                        <div class="signin">
                            <span>¿No tienes una cuenta? <a href="registro">Registrate aqui</a> </span>
                        </div>
                ';
                } else {
                    echo '
                        <div class="mb-3">
                            <label for="" class="form-label">Cédula</label>
                            <input type="text" class="form-control" name="" id="cedula_doc" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Contraseña</label>
                            <input type="text" class="form-control" name="" id="password_doc" aria-describedby="helpId" placeholder="">
                        </div>
                    <div class="input-field">
                       <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                    

                    <div class="signin">
                        <span>¿No tienes una cuenta? <a href="registro">Registrate aqui</a> </span>
                    </div>
                </div>

                        <div class="input-field">
                            <button type="submit" class="btn btn-primary" id="login_doc">Entrar</button>
                        </div>
                    ';
                }
                ?>
            </div>

        </div>
    </div>
</div>