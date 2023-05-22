<?php

require_once 'connection.php';

class AccessModel {

    /** Add a new Application */
    public static function addApplication($cv_application, $ds_application) {
        $sql = "INSERT INTO aplicaciones (CvAplicacion, DsAplicacion) VALUES (:cv_application, :ds_application)";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":cv_aplicacion", $cv_application, PDO::PARAM_STR);
        $stmt -> bindParam(":ds_aplicacion", $ds_application, PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
    }

    public static function saveAccess($id_user, $cv_access) {
        $sql = "INSERT INTO maccesos (CvUsuario, CvAplicacion) VALUES (:CvUsuario, :CvAplicacion)";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":CvUsuario", $id_user, PDO::PARAM_STR);
        $stmt -> bindParam(":CvAplicacion", $cv_access, PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
    }

    public static function getAccessByUser($id_user) {
        $sql = "SELECT * FROM maccesos WHERE CvUsuario = :cv_usuario";
        
        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":cv_usuario", $id_user, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt = null;
    }

    public static function getNameApp($cv_app) {
        $sql = "SELECT dsaplicacion FROM maplicaciones WHERE cvaplicacion = :cv_aplicacion";
        
        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":cv_aplicacion", $cv_app, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
        $stmt = null;
    }

}