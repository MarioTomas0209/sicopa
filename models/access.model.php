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

}