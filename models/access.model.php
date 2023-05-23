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
        $sql = "SELECT * FROM maccesos WHERE CvUsuario = :cv_usuario ORDER BY cvaplicacion ASC";
        
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

    public static function searchAccess($iduser, $cv_app) {
        $sql = "SELECT id_ FROM maccesos WHERE cvaplicacion = :cvaplicacion AND cvusuario = :cvusuario";
        
        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":cvaplicacion", $cv_app, PDO::PARAM_STR);
        $stmt -> bindParam(":cvusuario", $iduser, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
        $stmt = null;
    }

    public static function deleteAccess($id_) {
        $sql = "DELETE FROM maccesos WHERE id_ = :id_";
        
        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":id_", $id_, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
        $stmt = null;
    }

}