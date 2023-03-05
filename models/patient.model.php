<?php

require_once 'connection.php';

class PatientModel{

    // SHOW DATA IN THE TABLE
    public static function getPatients(){

        $sql = 'SELECT * FROM paciente';
        $stmt = Conexion::conectar() -> prepare ($sql);
        $stmt -> execute();
        
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);

    }

    // FUNCTION THAT ADDS TO THE PATIENTS
    public static function addPatient( $nombre, $apellidos, $fec_nac, $tel, $email, $password ) {

        $sql = "INSERT INTO paciente ( nombre, apellidos, fec_nac, tel, email, password ) VALUES ( :nombre, :apellidos, :fec_nac, :tel, :email, :password )";


        $stmt = Conexion::conectar() -> prepare( $sql );
        $stmt->bindParam( ':nombre', $nombre );
        $stmt->bindParam( ':apellidos', $apellidos );
        $stmt->bindParam( ':fec_nac', $fec_nac ); 
        $stmt->bindParam( ':tel', $tel );
        $stmt->bindParam( ':email', $email );
        $stmt->bindParam( ':password', $password );

        $stmt->execute();
    }

    // REMOVE PATIENT
    public static function removePatient($id){

        $sql = "DELETE FROM paciente WHERE id_paciente = :id";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();

    }
}

