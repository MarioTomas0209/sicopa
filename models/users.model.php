<?php

require_once 'connection.php';

class UsersModel {

    public static function saveUser($id_card, $name, $last_name, $address, $phone, $email, $password, $profile) {
        $sql = "INSERT INTO doctor(cedula, nombre, apellidos, direccion, telefono, email, password, perfil) VALUES (:cedula, :nombre, :apellidos, :direccion, :telefono, :email, :password, :perfil)";

        $stmt = Conexion::conectar()-> prepare($sql);
        $stmt->bindParam(':cedula', $id_card, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $name, PDO::PARAM_STR);
        $stmt->bindParam(':apellidos', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':perfil', $profile, PDO::PARAM_STR);

        $stmt->execute();
    }

}