<?php

require_once 'connection.php';

class ModelPassword {

    public static function getCurrentPassword($current_password, $username) {
        $sql = "SELECT CvUser, Password FROM Users WHERE Password = :Password AND Login = :Login";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(':Password', $current_password, PDO::PARAM_STR);
        $stmt -> bindParam(':Login', $username, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt = null;
    }

    public static function getExistsPassword($Password, $Login) {
        $sql = "SELECT * FROM Users WHERE Password = :Password AND Login != :Login";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(':Password', $Password, PDO::PARAM_STR);
        $stmt -> bindParam(':Login', $Login, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
        $stmt = null;
    }

    public static function changePassword($CvUser, $new_password) {
        $sql = "UPDATE Users SET Password = :Password WHERE CvUser = :CvUser";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":Password", $new_password, PDO::PARAM_STR);
        $stmt -> bindParam(":CvUser", $CvUser, PDO::PARAM_STR);
        $stmt -> execute();

        $stmt = null;
    }
    
}