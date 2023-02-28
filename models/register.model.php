<?php

// require_once ('connection.php');

// class ModelRegister {

//     public static function mdlRegistration($table, $nombre, $apellidos, $fec_nac, $email, $sexo, $direccion, $password){


//         $sql = "INSERT INTO $table (nombre, apellidos, fec_nac, email, sexo, direccion, password) VALUES (:nombre, :apellidos :fec_nac, :email, :sexo, :direccion, :password)";

//         $stmt = Conexion::conectar()-> prepare($sql);
//         $stmt->bindParam( ':nombre', $nombre['nombre'] );
//         $stmt->bindParam( ':apellidos', $apellidos['apellidos'] );
//         $stmt->bindParam( ':fec_nac', $fec_nac['fec_nac'] ); 
//         $stmt->bindParam( ':email', $email['email'] );
//         $stmt->bindParam( ':sexo', $sexo['sexo'] );
//         $stmt->bindParam( ':direccion', $direccion['direccion'] );

//         $password = password_hash($password['password'], PASSWORD_BCRYPT);
//         $stmt->bindParam(':password', $password);

//         $stmt->execute();

//         return $stmt -> fetch();
//     }
    
// }

?>