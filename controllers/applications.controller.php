<?php

if (isset($_POST['action'])) {

    require_once "../models/applications.model.php";
    $app = new ApplicationsController;

    switch ($_POST['action']) {
        case 'addApplication': $app -> addApplication();break;
    }

}

class ApplicationsController {

    public static function addApplication() {
        $cv_application = $_POST['cv_application'];
        $ds_application = $_POST['ds_application'];

        ApplicationsModel::addApplication($cv_application, $ds_application);

        echo ApplicationsController::ajaxGetApplications();
    }

    public static function getApplications() {
        return ApplicationsModel::getApplications();
    }

    public static function ajaxGetApplications() {
        $result = ApplicationsController::getApplications();

        $rows = '';
        $attributes = 'class="filasTablita" onclick="seleccionar(this.id);"';

        foreach ($result as $key => $value) {
            $id = 'id="'.$value[0].'"';
            $rows = $rows."<tr $attributes $id> <td>$value[0]</td> <td>$value[1]</td> </tr>";
        }

        echo $rows;
    }

}