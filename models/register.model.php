<?php

require_once ('connection.php');

class RegisterModel {

    public static function mdlRegistration($nombre, $apellidos, $fec_nac, $email, $sexo, $direccion, $password){

        $sql = "INSERT INTO paciente (nombre, apellidos, fec_nac, email, sexo, direccion, password) VALUES (:nombre, :apellidos, :fec_nac, :email, :sexo, :direccion, :password)";


        $stmt = Conexion::conectar()-> prepare($sql);
        $stmt->bindParam( ':nombre', $nombre );
        $stmt->bindParam( ':apellidos', $apellidos );
        $stmt->bindParam( ':fec_nac', $fec_nac ); 
        $stmt->bindParam( ':email', $email );
        $stmt->bindParam( ':sexo', $sexo );
        $stmt->bindParam( ':direccion', $direccion );
        $stmt->bindParam( ':password', $password );

        // $password = password_hash($password['password'], PASSWORD_BCRYPT);
        // $stmt->bindParam(':password', $password);

        $stmt->execute();
    }
    
}

?>