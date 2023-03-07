<?php

require_once 'connection.php';

class CatalogsModel {

    /** Get All Catalogs */
    public static function getCatalogs() {
        $sql = "SELECT * FROM ccatalog";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt = null;
    }

    /** Get a Data in a Catalog */
    public static function getData($ColCv, $id) {
        $sql = "SELECT * FROM mpersona WHERE $ColCv  = :$ColCv";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":$ColCv", $id, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
        $stmt = null;
    }

    /** Get Catalogs Data */
    public static function getDataCatalog($table) {
        $sql = "SELECT * FROM $table";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt = null;
    }

    /** Add a new Description in a Catalog */
    public static function addDescription($nameCatalog, $Cv, $Ds, $Description) {
        $sql = "INSERT INTO $nameCatalog($Ds) VALUES(:$Ds)";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":$Ds", $Description, PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
    }

    /** Validate that the data is not repeated */
    public static function validateNewData($nameCatalog, $Cv, $Ds, $Description) {
        $sql = "SELECT * FROM $nameCatalog WHERE $Ds = :$Ds";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":$Ds", $Description, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt = null;
    }

    /** Delete a Data in a Catalog */
    public static function deleteDescription($nameCatalog, $ColCv, $id) {
        $sql = "DELETE FROM $nameCatalog WHERE $ColCv = :$ColCv";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":$ColCv", $id, PDO::PARAM_STR);

        if ($stmt -> execute()) {
            return 'ok';
        } else {
            return 'error';
        }

        $stmt = null;
    }

    /** Edit a Description in a Catalog */
    public static function editDescription($nameCatalog, $ColCv, $ColDs, $new_description, $id_description) {
        $sql = "UPDATE $nameCatalog SET $ColDs = :$ColDs WHERE $ColCv = :$ColCv";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":$ColDs", $new_description, PDO::PARAM_STR);
        $stmt -> bindParam(":$ColCv", $id_description, PDO::PARAM_STR);
        $stmt -> execute();

        $stmt = null;
    }
}
