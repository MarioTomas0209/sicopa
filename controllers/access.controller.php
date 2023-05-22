<?php

if (isset($_POST['action'])) {

    require_once "../models/access.model.php";
    $CatalogsController = new AccessController;

    switch ($_POST['action']) {
        case 'addApplication': $CatalogsController -> addApplication();break;
        case 'saveAccess': $CatalogsController -> saveAccess();break;
        case 'searchAccess': $CatalogsController -> searchAccess();break;
        case 'getNameApp': $CatalogsController -> getNameApp();break;
    }

}

class AccessController {

    public static function addApplication() {
        $cv_application = $_POST['cv_application'];
        $ds_application = $_POST['ds_application'];

        AccessModel::addApplication($cv_application, $ds_application);

        echo 'SUCCESS';
    }

    public static function saveAccess() {
        $id_user = $_POST['id_user'];
        $array_access = $_POST['access'];

        foreach ($array_access as $key => $value) {
            AccessModel::saveAccess($id_user, $value);
        }
    }

    public static function searchAccess() {
        $id_user = $_POST['id_user'];

        $result = AccessModel::getAccessByUser($id_user);
        $access = "";

        foreach ($result as $key => $value) {
            $access .= $value[1].",";
        }

        echo $access;
    }

    public static function getNameApp() {
        $cv = $_POST['cv_app'];

        $response = AccessModel::getNameApp($cv);

        echo $response[0];
    }

}