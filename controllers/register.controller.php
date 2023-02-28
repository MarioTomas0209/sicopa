<?php

class RegisterController{

    // PATIENT REGISTER

    public static function ctrRegister() {

        if (isset($_POST['nombre'])) {

            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $fec_nac = $_POST['fec_nac'];
            $email = $_POST['email'];
            $sexo = $_POST['sexo'];
            $direccion = $_POST['direccion'];
            $password = $_POST['password'];

            RegisterModel::mdlRegistration($nombre, $apellidos, $fec_nac, $email, $sexo, $direccion, $password);
        }

    }
}