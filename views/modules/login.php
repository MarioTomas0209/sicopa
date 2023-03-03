<?php 
    if (isset($_SESSION['usuario'])) {
        header('location: '.SERVER_URL);
    }
?>

<div class="wrapper">
    <div class="container main">

        <div class="row card-login">
            <?php
                if ($ruta[1] == 'paciente') {
                    echo '<div class="col-md-6 side-image">';
                } else if ($ruta[1] == 'doctor') {
                    echo '<div class="col-md-6 side-image2">';
                } else {
                    echo '<script>window.location = "' . SERVER_URL . '"</script>';
                }
            ?>
            <img src="<?php echo SERVER_URL ?>views/img/login.svg" class="img-fluid img-login rounded-top" alt="">
            <div class="text">
                <a class="logo navbar-brand" href="site">SICOPA</a>
            </div>
        </div>

        <div class="col-md-6 right">
            <div class="input-box">
                <header>INICIA SESIÓN</header>
                <form action="POST" id="login_form">
                    <div class="mb-3">
                        <label for="" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="email" value="shaun.murphy@mail.com">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" value="gooddoctor">
                    </div>

                    <input type="hidden" name="table" id="table" value="<?php echo $ruta[1] ?>">

                    <div class="input-field">
                        <button type="submit" id="login" class="btn btn-primary">Entrar</button>
                    </div>

                    <?php
                        if ($ruta[1] == 'paciente') {
                            echo '
                                <div class="signin">
                                    <span>¿No tienes una cuenta? <a href="' . SERVER_URL . 'registro">Registrate aqui</a> </span>
                                </div>';
                        }
                    ?>
                </form>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript" src="<?php echo SERVER_URL ?>views/js/login.js"></script>