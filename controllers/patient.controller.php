<?php

class PatientController {

    public static function getPatients() {
        return PatientModel::getPatients();
    }

    // FUNCTION THAT ADDS TO THE PATIENTS
    public static function addPatient() {

        if ($_POST) {

            $nombre = ( isset($_POST['nombre']) ? $_POST['nombre'] : '');
            $apellidos = ( isset($_POST['apellidos']) ? $_POST['apellidos'] : '');
            $fec_nac = ( isset($_POST['fec_nac']) ? $_POST['fec_nac'] : '');
            $tel = ( isset($_POST['tel']) ? $_POST['tel'] : '');
            $email = ( isset($_POST['email']) ? $_POST['email'] : '');
            $password = ( isset($_POST['password']) ? $_POST['password'] : '');

            PatientModel::addPatient($nombre, $apellidos, $fec_nac, $tel, $email, $password);

            // exit();

        }

        // if (isset($_POST['nombre'])) {

        //     $nombre = $_POST['nombre'];
        //     $apellidos = $_POST['apellidos'];
        //     $fec_nac = $_POST['fec_nac'];
        //     $tel = $_POST['tel'];
        //     $email = $_POST['email'];
        //     $password = $_POST['password'];

        //     PatientModel::addPatient($nombre, $apellidos, $fec_nac, $tel, $email, $password);

        // }

    }

    // REMOVE PATIENT
    public static function removePatient($id_patient) {
        PatientModel::removePatient($id_patient);
    }
}