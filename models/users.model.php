<?php

require_once 'connection.php';

class UsersModel {

    /** Get user doctor */
    public static function getUser($id_user) {
        $sql = "SELECT * FROM doctor WHERE id_doctor = :id_doctor";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":id_doctor", $id_user, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
    }

    public static function saveUser($id_card, $name, $last_name, $address, $phone, $email, $password, $profile) {
        $sql = "INSERT INTO doctor(cedula, nombre, apellidos, direccion, telefono, email, password, perfil) VALUES (:cedula, :nombre, :apellidos, :direccion, :telefono, :email, :password, :perfil)";

        $stmt = Conexion::conectar()-> prepare($sql);
        $stmt->bindParam(':cedula', $id_card, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $name, PDO::PARAM_STR);
        $stmt->bindParam(':apellidos', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $address, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':perfil', $profile, PDO::PARAM_STR);

        $stmt->execute();
    }

    /** Delete User[doctor] from table doctor */
    public static function deleteUser($id_user) {
        $sql = "DELETE FROM doctor WHERE id_doctor = :id_doctor";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":id_doctor", $id_user, PDO::PARAM_STR);

        $stmt -> execute();
    }

}