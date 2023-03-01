<?php

class UsersController {

    public static function getUsers() {
        return LoginModel::getUsers();
    }

}