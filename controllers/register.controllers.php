<?php

// class ControllerRegister{

    // PATIENT REGISTRY
//     public static function ctrRegister($data) {

//         $table = $data['table'];
//         $nombre = $data['nombre'];
//         $apellidos = $data['apellidos'];
//         $fec_nac = $data['fec_nac'];
//         $email = $data['email'];
//         $sexo = $data['sexo'];
//         $direccion = $data['direccion'];
//         $password = $data['password'];

//         $patient = ModelRegister::mdlRegistration($table, $nombre, $apellidos, $fec_nac, $email, $sexo, $direccion, $password);

//         if( $patient ) {

//             $_SESSION['paciente'] = $table;
//             $_SESSION['nombre'] = $patient['nombre'];
//             $_SESSION['apellidos'] = $patient['nombre'];
//             $_SESSION['fec_nac'] = $patient['fec_nac'];
//             $_SESSION['email'] = $patient['email'];
//             $_SESSION['sexo'] = $patient['sexo'];
//             $_SESSION['direccion'] = $patient['direccion'];
//             $_SESSION['password'] = $patient['password'];

//         }

//     }
// }