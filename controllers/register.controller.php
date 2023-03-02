<?php

class RegisterController{

    // PATIENT REGISTER

    public static function ctrRegister() {

        if (isset($_POST['nombre'])) {

            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $fec_nac = $_POST['fec_nac'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $password = $_POST['password'];

            RegisterModel::mdlRegistration($nombre, $apellidos, $fec_nac, $email, $tel, $password);

            session_start();
            $_SESSION['usuario'] = 'paciente';
            $_SESSION['id'] = 1;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellidos'] = $apellidos;
            $_SESSION['email'] = $email;

            header('location: main');
    
            
        }

    }
}