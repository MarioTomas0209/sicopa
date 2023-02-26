<?php

require_once 'connection.php';

class LoginModel {

    /** Get all users from table doctors */
    public static function getUsers() {
        $sql = 'SELECT * FROM doctor';

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> execute();

        return $stmt -> fetchAll();
    }

    /** Get user, can be patient or doctor */
    public static function getUser($table, $email, $password) {
        $sql = "SELECT * FROM $table WHERE email = :email AND password = :password";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":email", $email, PDO::PARAM_STR);
        $stmt -> bindParam(":password", $password, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
    }
}