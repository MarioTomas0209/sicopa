<?php

require_once 'connection.php';

class Services {

    /** Get All the Services offered by the consulting room */
    public static function getServices() {
        $sql = 'SELECT * FROM cservicio';

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> execute();

        return $stmt -> fetchAll();
    }
}