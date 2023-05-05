<?php

if (isset($_POST['action'])) {

    require_once "../models/access.model.php";
    $CatalogsController = new AccessController;

    switch ($_POST['action']) {
        case 'addApplication': $CatalogsController -> addApplication();break;
    }

}

class AccessController {

    public static function addApplication() {
        $cv_application = $_POST['cv_application'];
        $ds_application = $_POST['ds_application'];

        AccessModel::addApplication($cv_application, $ds_application);

        echo 'SUCCESS';
    }

}