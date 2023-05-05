<?php

require_once 'connection.php';

class ApplicationsModel {

    /** Add a new Application */
    public static function addApplication($cv_application, $ds_application) {
        $sql = "INSERT INTO aplicaciones (CvAplicacion, DsAplicacion) VALUES (:cv_application, :ds_application)";

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
        $sql = "SELECT * FROM aplicaciones";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt = null;
    }

}