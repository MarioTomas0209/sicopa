<?php

if (isset($_POST['action'])) {

    session_start();

    require_once "../models/access.model.php";
    require_once "../models/applications.model.php";
    
    $CatalogsController = new AccessController;

    switch ($_POST['action']) {
        case 'addApplication': $CatalogsController -> addApplication();break;
        case 'saveAccess': $CatalogsController -> saveAccess();break;
        case 'searchAccess': $CatalogsController -> searchAccess();break;
        case 'getNameApp': $CatalogsController -> getNameApp();break;
        case 'getAllApplications': $CatalogsController -> getAllApplications();break;
    }

}

class AccessController {

    public $create = false;
    public $edit = false;
    public $delete = false;


    public function __construct() {

        if ($_SESSION['CvUser'] == 1) {
            $this->create = true;
            $this->edit = true;
            $this->delete = true;

            return false;
        }

        $access_user = AccessController::getAccess($_SESSION['CvUser']);
        $permissions = ["SIC61000" => "create", "SIC62000" => "edit", "SIC63000" => "delete"];

        foreach ($permissions as $cv => $permission) {
            if (in_array($cv, $access_user)) {
                $this->$permission = true;
            }
        }

    }

    public static function getAccess($CvUser) {
        $result = ApplicationsModel::getAccessByUser($CvUser);
        $access = [];

        foreach ($result as $key => $value) {
            $access[] = $value[2];
        }

        return $access;
    }

    public static function addApplication() {
        $cv_application = $_POST['cv_application'];
        $ds_application = $_POST['ds_application'];

        AccessModel::addApplication($cv_application, $ds_application);

        echo 'SUCCESS';
    }

    public static function saveAccess() {
        $id_user = $_POST['id_user'];

        $success_ = $_POST['success_'] ?? [];
        $deleted_ = $_POST['deleted_'] ?? [];

        foreach ($deleted_ as $key => $value) {
            $exists = AccessModel::searchAccess($id_user, $value);
            $id_ = $exists['id_'];
            AccessModel::deleteAccess($id_);
        }

        foreach ($success_ as $key => $value) {


            $exists = AccessModel::searchAccess($id_user, $value);

            if (!($exists)) {
                AccessModel::saveAccess($id_user, $value);
            }
        }
    }

    public static function searchAccess() {
        $id_user = $_POST['id_user'];

        $result = AccessModel::getAccessByUser($id_user);
        $access = "";

        foreach ($result as $key => $value) {
            $access .= $value[2].",";
        }

        echo $access;
    }

    public static function getNameApp() {
        $cv = $_POST['cv_app'];

        $response = AccessModel::getNameApp($cv);

        echo $response[0];
    }

    public static function getAllApplications() {
        $result = ApplicationsModel::getApplications();

        $app = "";

        foreach ($result as $key => $value) {
            $app .= $value[0].",";
        }

        echo $app;
    }

}