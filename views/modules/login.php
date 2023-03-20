<?php
if (isset($_SESSION['usuario'])) {
    header('location: ' . SERVER_URL);
}
?>

<div class="wrapper">
    <div class="container main">

        <div class="row card-login">
            <div class="col-md-6 side-image">
                <img src="<?php echo SERVER_URL ?>views/img/login.svg" class="img-fluid img-login rounded-top" alt="">
                <div class="text">
                    <a class="logo navbar-brand" href="main">SICOPA</a>
                </div>
            </div>

            <div class="col-md-6 right">
                <div class="input-box">
                    <header>INICIA SESIÓN</header>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">Correo</label>
                            <input type="text" class="form-control" id="email" name="email" autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="input-field">
                            <button type="submit" id="login" class="btn btn-primary">Entrar</button>
                        </div>

                        <?php
                        $login = new ControllerUsuarios();
                        $login->Login();
                        ?>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <!-- <script type="text/javascript" src="<?php echo SERVER_URL ?>views/js/login.js"></script> -->