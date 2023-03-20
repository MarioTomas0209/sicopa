<?php

require_once 'connection.php';

class LoginModel {

    /** Get all users from table doctors */
    public static function getUsers() {
        $sql = 'SELECT * FROM doctor WHERE email NOT IN ("admin")';

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> execute();

        return $stmt -> fetchAll();
    }

    
    public static function getUser($email, $password) {
        $sql = "SELECT u.login, p.cvperson, n.dsnombre, a.dsapellido 
                FROM users u, mpersona p, cnombre n, capellido a
                WHERE login = :login AND password = :password 
                AND p.cvperson = u.cvperson AND n.cvnombre = p.cvnombre AND a.cvapellido = p.cvapepat";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":login", $email, PDO::PARAM_STR);
        $stmt -> bindParam(":password", $password, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
    }
}