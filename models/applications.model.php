<?php

use FTP\Connection;

require_once 'connection.php';

class ApplicationsModel {

    /** Add a new Application */
    public static function addApplication($cv_application, $ds_application) {
        $sql = "INSERT INTO maplicaciones (CvAplicacion, DsAplicacion) VALUES (:cv_application, :ds_application)";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":cv_application", $cv_application, PDO::PARAM_STR);
        $stmt -> bindParam(":ds_application", $ds_application, PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
    }

    /**
     * Get all applications
     */
    public static function getApplications() {
        $sql = "SELECT * FROM maplicaciones ORDER BY cvaplicacion ASC";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt = null;
    }

    /**
     * Get 1 row with .......
     */
    public static function getApplication($value) {
        $sql = "SELECT * FROM maplicaciones WHERE CvAplicacion = :CvAplicacion";
        
        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":CvAplicacion", $value, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
        $stmt = null;
    }

    /**
     * Get main module for after get submodule
     */
    public static function getModules() {
        $sql = "SELECT * FROM maplicaciones WHERE CvAplicacion LIKE '%0000'";
        
        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt = null;
    }

    /**
     * Get submodules
     */
    public static function getSubModules($subs) {
        $sql = "SELECT * FROM maplicaciones WHERE CvAplicacion LIKE '$subs%' LIMIT 18446744073709551615 OFFSET 1";
        
        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt = null;
    }

    public static function getModuleMain($main) {
        $sql = "SELECT * FROM maplicaciones WHERE CvAplicacion LIKE '$main%'";
        
        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt = null;
    }

    /**
     * 
     */
    public static function getValues($id) {
        $sql = "SELECT * FROM maplicaciones WHERE CvAplicacion = :CvAplicacion";
        
        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":CvAplicacion", $id, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt = null;
    }


    public static function editApplication($cv, $ds) {
        $sql = "UPDATE maplicaciones SET dsaplicacion = :dsaplicacion WHERE cvaplicacion = :cvaplicacion";
        
        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":dsaplicacion", $ds, PDO::PARAM_STR);
        $stmt -> bindParam(":cvaplicacion", $cv, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt = null;       
    }

    public static function deleteApp($id) {
        $sql = "DELETE FROM maplicaciones WHERE CvAplicacion = :CvAplicacion";
        
        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":CvAplicacion", $id, PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;              
    }

    public static function integrity($id) {
        $sql = "SELECT * FROM maccesos WHERE CvAplicacion = :CvAplicacion";
        
        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":CvAplicacion", $id, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt = null;              
    }

    public static function getAccessByUser($CvUser) {
        $sql = "SELECT * FROM maccesos WHERE CvUsuario = :CvUsuario";
        
        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":CvUsuario", $CvUser, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt = null; 
    }
}