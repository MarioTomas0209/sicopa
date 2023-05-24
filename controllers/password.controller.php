<?php

class ControllerPassword {

    public $edit = false;


    public function __construct() {

        if ($_SESSION['CvUser'] == 1) {
            $this->edit = true;

            return false;
        }

        $access_user = AccessController::getAccess($_SESSION['CvUser']);
        $permissions = ["SIC42000" => "edit"];

        foreach ($permissions as $cv => $permission) {
            if (in_array($cv, $access_user)) {
                $this->$permission = true;
            }
        }

    }

    public static function changePassword() {
        if (isset($_POST['current_password'])) {

            $current_password = ModelPassword::getCurrentPassword($_POST['current_password'], $_SESSION['login']);

            if ($current_password) {

                $new_password = $_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];

                if ($new_password == $confirm_password) {

                    $repeat = ModelPassword::getExistsPassword($new_password, $_SESSION['login']);

                    if ($repeat) {
                        echo '<script>
                                swal({
                                    type: "error",
                                    title: "¡Contraseña Invalida!",
                                    text: "Pongase en contato con su administrador",
                                    showCancelButton: false,
                                    confirmButtonColor: "#3085d6",
                                    confirmButtonText: "Aceptar"
                                });
                                
                                $("#current_password").val("'.$_POST['current_password'].'");
                            </script>';
                        
                    } else {
                        ModelPassword::changePassword($current_password[0][0], $new_password);

                        echo
                        '<script>
                            swal({
                                type: "success",
                                title: "¡La contraseña ah sido cambiadio exitosamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            }).then((result) => {
                                if (result.value) {
                                    //window.location = "inicio";
                                }
                            });
                        </script>';
                    }

                } else {
                    echo '<script>
                            swal({
                                type: "error",
                                title: "¡Error!",
                                text: "¡Las contraseñas nuevas no coinciden!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            });
                                
                            $("#current_password").val("'.$_POST['current_password'].'");
                            $("#new_password").val("'.$_POST['new_password'].'");
                            $("#confirm_password").val("'.$_POST['confirm_password'].'");
                        </script>';
                }

            } else {
                echo '<script>
                        swal({
                            type: "error",
                            title: "¡Error!",
                            text: "¡Contraseña actual incorrecta!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        });
                        
                        $("#current_password").val("'.$_POST['current_password'].'");
                        $("#new_password").val("'.$_POST['new_password'].'");
                        $("#confirm_password").val("'.$_POST['confirm_password'].'");
                       </script>';
            }
        }
    }
    
}