<?php

class UsersController {

    public static function getUsers() {
        return LoginModel::getUsers();
    }

    public static function saveUser($data) {
        $id_card = $data['id_card'];
        $name = $data['_name'];
        $last_name = $data['last_name'];
        $address = $data['address'];
        $phone = $data['phone'];
        $email = $data['email'];
        $password = $data['password'];
        $profile = $data['profile'] == 1 ? 'admin' : 'asistente';

        UsersModel::saveUser($id_card, $name, $last_name, $address, $phone, $email, $password, $profile);

        echo 'true';
    }

}

/** Ajax */
$data = json_decode(file_get_contents('php://input'), true); // Get data sent by AJAX

if ($data) {
    require_once "../models/login.model.php";
    $login = new UsersController;
    $login -> saveUser($data);
}