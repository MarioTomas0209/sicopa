<?php

class PatientController {

    public static function getPatient() {
        return PatientModel::getPatient();
    }

    // FUNCTION THAT ADDS TO THE PATIENTS
    public static function addPatient() {

        if (isset($_POST['nombre'])) {

            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $fec_nac = $_POST['fec_nac'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            PatientModel::addPatient($nombre, $apellidos, $fec_nac, $tel, $email, $password);
            header('Location: pacientes');
        }

    }

    // REMOVE PATIENT
    public static function removePatient(){

        if ( isset( $_POST['eliminar'] ) ) {
            
            // $txtID = ( isset( $_POST['eliminar'] ) ) ? $_POST['eliminar'] : '';

            // PatientModel::removePatient($txtID);

            echo '<script>window.location = "pacientes"</script>';
        }
    }
}