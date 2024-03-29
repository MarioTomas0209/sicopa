<?php

if (isset($_POST['action'])) {

    require_once "../models/applications.model.php";
    require_once "../controllers/access.controller.php";
    
    $app = new ApplicationsController;

    switch ($_POST['action']) {
        case 'addApplication': $app -> addApplication();break;
        case 'editApplication': $app -> editApplication();break;
        case 'validate_no_repeat': $app -> searchData();break;
        case 'search_module': $app -> ajaxSearchModule();break;
        case 'getValuesEdit': $app -> getValues();break;
        case 'deleteApp': $app -> deleteApp();break;
        case 'integrity': $app -> integrity();break;
    }

}

class ApplicationsController {

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
        $permissions = ["SIC51000" => "create", "SIC52000" => "edit", "SIC53000" => "delete"];

        foreach ($permissions as $cv => $permission) {
            if (in_array($cv, $access_user)) {
                $this->$permission = true;
            }
        }

    }

    public static function addApplication() {
        $cv_application = $_POST['cv_application'];
        $ds_application = $_POST['ds_application'];

        ApplicationsModel::addApplication($cv_application, $ds_application);
    }

    public static function getApplications() {
        return ApplicationsModel::getApplications();
    }
    
    public static function getModulesApp() {
        return ApplicationsModel::getModules();
    }

    public static function getSubModulesApp($subs) {
        return ApplicationsModel::getSubModules($subs);
    }

    public static function ajaxSearchModule() {
        $value = $_POST['data'];

        $result = ApplicationsModel::getModuleMain($value);

        if ($result) {
            echo 'exists';
        } else {
            echo 'not_exists';
        }
    }

    public static function searchData() {
        $data = $_POST['data'];
        
        $response = ApplicationsModel::getApplication($data);

        echo $response ? 'exists' : 'not_exists';

    }

    public static function getValues() {
        $id = $_POST['id'];
        $result = ApplicationsModel::getValues($id);
        
        $cv_application = $result[0]['CvAplicacion'];
        $ds_application = $result[0]['DsAplicacion'];

        $array = [
            "cv_application" => $cv_application,
            "ds_application" => $ds_application
        ];

        echo json_encode($array);
    }

    public static function editApplication() {
        $cv_application = $_POST['cv_application'];
        $ds_application = $_POST['ds_application'];

        ApplicationsModel::editApplication($cv_application, $ds_application);
    }

    public static function deleteApp() {
        $id = $_POST['id'];
        ApplicationsModel::deleteApp($id);
        echo '';
    }

    public static function integrity() {
        $id = $_POST['id'];

        $response = ApplicationsModel::integrity($id);

        if ($response) {
            echo 'exists';
        } else {
            echo 'not_exists';
        }
    }

}