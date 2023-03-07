<?php

/** Ajax */
$data = json_decode(file_get_contents('php://input'), true); // Get data sent by AJAX

if ($data) {
    require_once "../models/users.model.php";
    $users = new UsersController;

    switch ($data['action']) {
        case 'saveUser': $users -> saveUser($data); break;
        case 'getUser': $users -> getUser($data['id_user']); break;
        case 'deleteUser': $users -> deleteUser($data['id_user']); break;

        default: /** code... */ break;
    }
}

class UsersController {

    public static function getUsers() {
        return LoginModel::getUsers();
    }

    public static function getUser($id_user) {
        $user_data = UsersModel::getUser($id_user);

        echo json_encode($user_data); // Return response in JSON format
    }

    public static function saveUser($data) {
        $id_card = $data['id_card'];
        $name = $data['name'];
        $last_name = $data['last_name'];
        $address = $data['address'];
        $phone = $data['phone'];
        $email = $data['email'];
        $password = $data['password'];
        $profile = $data['profile'] == 1 ? 'admin' : 'asistente';

        UsersModel::saveUser($id_card, $name, $last_name, $address, $phone, $email, $password, $profile);

        echo 'true';
    }
    
    public static function deleteUser($data) {
        UsersModel::deleteUser($data);
    }

}