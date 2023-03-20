<?php

class LoginController {

    public static function getUsers() {
        return LoginModel::getUsers();
    }   

    public static function getUser($data) {
        $email = $data['email'];
        $password = $data['password'];

        $user = LoginModel::getUser($email, $password);

        if ($user) {

            if ($user['fecini']) {
                
            }


            session_start();
            $_SESSION['id_'] = 1;
            $_SESSION['nombre'] = $user['dsnombre'];
            $_SESSION['apellidos'] = $user['dsapellido'];
            $_SESSION['login'] = $user['login'];
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