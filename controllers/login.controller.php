<?php

class LoginController {

    public static function getUsers() {
        return LoginModel::getUsers();
    }   

    public static function getUser($data) {
        $table = $data['table'];
        $email = $data['email'];
        $password = $data['password'];

        $user = LoginModel::getUser($table, $email, $password);

        if ($user) {
            session_start();
            $_SESSION['usuario'] = $table;
            $_SESSION['id_'] = 1;
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['apellidos'] = $user['apellidos'];
            $_SESSION['email'] = $user['email'];
        }
        
        echo json_encode($user); // Return response in JSON format
    }

}


/** Ajax */
$data = json_decode(file_get_contents('php://input'), true); // Get data sent by AJAX

if ($data) {
    require_once "../models/login.model.php";
    $login = new LoginController;
    $login -> getUser($data);
}