<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="views/js/password.js"></script>

<div class="content-wrapper">
    <section class="content">

        <div class="content-header text-center">
            <h1>
                Cambiar contraseña
            </h1>
        </div>

        <div class="box">
            <br>
            <div class="col-md-4 col-md-offset-4 panel-style" style="width: 42% !important; margin-left: 30%;">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        <h3 class="panel-title">
                            <strong>
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </strong>
                        </h3>

                    </div>

                    <div class="panel-body">
                        <form method="POST">

                            <label for="current_password">Contraseña Actual</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Contraseña Actual" required>
                                </div>

                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary">
                                        <label for="check_current">Ver contraseña &nbsp;</label>
                                        <input type="checkbox" id="check_current" inputCheck="current_password">
                                    </button>
                                </div>
                            </div>

                            <hr>

                            <label for="new_password">Nueva Contraseña</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Nueva Contraseña" required>
                                </div>

                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary">
                                        <label for="check_new">Ver contraseña &nbsp;</label>
                                        <input type="checkbox" id="check_new" inputCheck="new_password">
                                    </button>
                                </div>
                            </div>

                            <br>

                            <label for="confirm_password">Confirmar Contraseña</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirmar Contraseña" required>
                                </div>

                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary">
                                        <label for="check_confirm">Ver contraseña &nbsp;</label>
                                        <input type="checkbox" id="check_confirm" inputCheck="confirm_password">
                                    </button>
                                </div>
                            </div>

                            <br><br>

                            <div class="form-group">
                                <button type="submit" id="Cambiar" class="btn btn-primary mr-5" style="margin-right: 25px; width: 150px;">
                                    <i class="bi bi-check-circle"></i> Cambiar
                                </button>

                                <button type="button" id="cancelar" class="btn btn-danger" onclick="window.location = 'password'" style="width: 150px;">
                                    <i class="bi bi-x-lg"></i> Cancelar
                                </button>
                            </div>

                            <?php
                            $Passw = new ControllerPassword();
                            $Passw->changePassword();
                            ?>

                        </form>
                    </div>
                </div>

            </div>

            <div class="clearfix"></div>

        </div>
    </section>

</div>