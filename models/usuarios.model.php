<?php

require_once 'connection.php';

class ModelUsuarios {

    /** Get All People in mPersonas */
    public static function getPeople() {
        $sql = "SELECT Persona.CvPerson, Nombre.DsNombre, ApePat.DsApellido 'DsApePat', ApeMat.DsApellido 'DsApeMat', TipPerson.DsTipPerson 
                FROM mPersona Persona, cNombre Nombre, cApellido ApePat, cApellido ApeMat, cTipPerson TipPerson
                WHERE Nombre.CvNombre = Persona.CvNombre AND ApePat.CvApellido = Persona.CvApePat AND ApeMat.CvApellido = Persona.CvApeMat AND TipPerson.CvTipPerson = Persona.CvTipPerson";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt = null;
    }

    /** Ger User in Table Users */
    public static function getUser($Login) {
        // $sql = "SELECT * FROM Users WHERE Login = :Login";
        $sql = "SELECT u.cvuser, u.login, u.password, p.cvperson, n.dsnombre, a.dsapellido, u.fecini, u.fecfin, u.edocta
                FROM users u, mpersona p, cnombre n, capellido a
                WHERE login = :login 
                AND p.cvperson = u.cvperson AND n.cvnombre = p.cvnombre AND a.cvapellido = p.cvapepat;";

        $stmt = Conexion::conectar()->prepare($sql);
        $stmt -> bindParam(':login', $Login, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
    }

    /** Get Users in Table Users */
    public static function getUsers() {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM Users WHERE login NOT IN ('admin') ORDER BY CvUser ASC");
        $stmt -> execute();

        return $stmt -> fetchAll();
    }

    public static function getPerson($CvPerson) {
        $sql = "SELECT Nombre.DsNombre, ApePat.DsApellido 'DsApePat', ApeMat.DsApellido 'DsApeMat', TipPerson.DsTipPerson 
                FROM mPersona Persona, cNombre Nombre, cApellido ApePat, cApellido ApeMat, cTipPerson TipPerson
                WHERE Nombre.CvNombre = Persona.CvNombre AND ApePat.CvApellido = Persona.CvApePat AND ApeMat.CvApellido = Persona.CvApeMat AND TipPerson.CvTipPerson = Persona.CvTipPerson AND CvPerson = :CvPerson";

        $stmt = Conexion::conectar()->prepare($sql);
        $stmt -> bindParam(':CvPerson', $CvPerson, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
    }

    public static function addNewUser($CvUser, $CvPerson, $Login, $Password, $FecIni, $FecFin, $EdoCta) {
        $sql = "INSERT INTO Users() VALUES(:CvUser, :CvPerson, :Login, :Password, :FecIni, :FecFin, :EdoCta)";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":CvUser", $CvUser, PDO::PARAM_STR);
        $stmt -> bindParam(":CvPerson", $CvPerson, PDO::PARAM_STR);
        $stmt -> bindParam(":Login", $Login, PDO::PARAM_STR);
        $stmt -> bindParam(":Password", $Password, PDO::PARAM_STR);
        $stmt -> bindParam(":FecIni", $FecIni, PDO::PARAM_STR);
        $stmt -> bindParam(":FecFin", $FecFin, PDO::PARAM_STR);
        $stmt -> bindParam(":EdoCta", $EdoCta, PDO::PARAM_STR);

        $stmt -> execute();
        $stmt = null;
    }

    public static function getDataUser($CvUser) {
        $sql = "SELECT * FROM Users WHERE CvUser = :CvUser";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":CvUser", $CvUser, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
        $stmt = null;
    }

    public static function deleteUser($CvUser) {
        $sql = "DELETE FROM Users WHERE CvUser = :CvUser";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":CvUser", $CvUser, PDO::PARAM_STR);
        $stmt -> execute();

        $stmt = null;
    }

    public static function editUser($CvUser, $CvPerson, $Login, $Password, $FecIni, $FecFin, $EdoCta) {
        if ($Password == '') {
            $sql = "UPDATE Users SET CvPerson = :CvPerson, Login = :Login, FecIni = :FecIni, FecFin = :FecFin, EdoCta = :EdoCta WHERE CvUser = :CvUser";

            $stmt = Conexion::conectar() -> prepare($sql);
            $stmt -> bindParam(":CvPerson", $CvPerson, PDO::PARAM_STR);
            $stmt -> bindParam(":Login", $Login, PDO::PARAM_STR);
        } else {
            $Password = $Password;
            $sql = "UPDATE Users SET CvPerson = :CvPerson, Login = :Login, Password = :Password, FecIni = :FecIni, FecFin = :FecFin, EdoCta = :EdoCta WHERE CvUser = :CvUser";

            $stmt = Conexion::conectar() -> prepare($sql);
            $stmt -> bindParam(":CvPerson", $CvPerson, PDO::PARAM_STR);
            $stmt -> bindParam(":Login", $Login, PDO::PARAM_STR);
            $stmt -> bindParam(":Password", $Password, PDO::PARAM_STR);
        }

        $stmt -> bindParam(":FecIni", $FecIni, PDO::PARAM_STR);
        $stmt -> bindParam(":FecFin", $FecFin, PDO::PARAM_STR);
        $stmt -> bindParam(":EdoCta", $EdoCta, PDO::PARAM_STR);
        $stmt -> bindParam(":CvUser", $CvUser, PDO::PARAM_STR);
        $stmt -> execute();

        $stmt = null;
    }

    public static function validateUsername($Login) {
        $sql = "SELECT * FROM Users WHERE Login = :Login";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":Login", $Login, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
        $stmt = null;
    }

    public static function validatePassword($Password) {
        $sql = "SELECT * FROM Users WHERE Password = :Password";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":Password", $Password, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
        $stmt = null;
    }

    public static function getUserById($CvUser) {
        $sql = "SELECT * FROM Users WHERE CvUser = :CvUser";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":CvUser", $CvUser, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
        $stmt = null;
    }

    public static function disableEdoCta($CvUser, $EdoCta) {
        $sql = "UPDATE Users SET EdoCta = :EdoCta WHERE CvUser = :CvUser";

        $stmt = Conexion::conectar() -> prepare($sql);
        $stmt -> bindParam(":EdoCta", $EdoCta, PDO::PARAM_STR);
        $stmt -> bindParam(":CvUser", $CvUser, PDO::PARAM_STR);
        $stmt -> execute();

        $stmt = null;
    }

}