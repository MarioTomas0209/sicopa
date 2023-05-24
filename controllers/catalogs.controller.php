<?php

if (isset($_POST['action'])) {

    require_once "../models/catalogs.model.php";
    require_once "../controllers/access.controller.php";

    $CatalogsController = new CatalogsController();

    switch ($_POST['action']) {
        case 'SelectCatalog': $CatalogsController -> getDataCatalog();break;
        case 'addDescription': $CatalogsController -> addDescription();break;
        case 'validateNewData': $CatalogsController -> validateNewData();break;
        case 'Integridad': $CatalogsController -> IntegridadReferencial();break;
        case 'deleteDescription': $CatalogsController -> deleteDescription();break;
        case 'editDescription': $CatalogsController -> editDescription();break;
    }

}

class CatalogsController {

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
        $permissions = ["SIC11000" => "create", "SIC12000" => "edit", "SIC13000" => "delete"];

        foreach ($permissions as $cv => $permission) {
            if (in_array($cv, $access_user)) {
                $this->$permission = true;
            }
        }

    }

    public static function getCatalogs() {
        return CatalogsModel::getCatalogs();
    }

    function getDataCatalog() {
        $nameCatalog = $_POST['catalog'];

        $result = CatalogsModel::getDataCatalog($nameCatalog);

        $rows = '';
        $attributes = 'class="filasTablita" onclick="seleccionar(this.id);"';

        foreach ($result as $key => $value) {
            $id = 'id="'.$value[0].'"';
            $rows = $rows."<tr $attributes $id> <td>$value[0]</td> <td>$value[1]</td> </tr>";
        }

        echo $rows;
    }

    function addDescription() {
        $columns = $_POST['columns'];
        $nameCatalog = $_POST['catalog'];
        $Description = $_POST['description'];

        CatalogsModel::addDescription($nameCatalog, $columns[0], $columns[1], $Description);

        echo '';
    }

    function validateNewData() {
        $columns = $_POST['columns'];
        $nameCatalog = $_POST['catalog'];
        $Description = $_POST['description'];

        $result = CatalogsModel::validateNewData($nameCatalog, $columns[0], $columns[1], $Description);

        if (count($result) == 0) {
            echo 'false';
        } else {
            echo 'true';
        }

    }

    function IntegridadReferencial() {
        $ColCv = $_POST['ColCv'];
        
        $id = $_POST['id'];

        if ($ColCv == 'CvApellido') {

            $res_ape1 = CatalogsModel::getData('CvApePat', $id);
            $res_ape2 = CatalogsModel::getData('CvApeMat', $id);

            if ($res_ape1 || $res_ape2){echo'true';}else{echo'false';}

        } else {

            $res = CatalogsModel::getData($ColCv, $id);

            if ($res){echo'true';}else{echo'false';}

        }
    }


    function deleteDescription() {
        $nameCatalog = $_POST['catalog'];
        $ColCv = $_POST['ColCv'];
        $id = $_POST['id'];

        CatalogsModel::deleteDescription($nameCatalog, $ColCv, $id);
        echo '';
    }

    function editDescription() {
        $nameCatalog = $_POST['catalog'];
        $columns = $_POST['columns'];

        $id_description = $_POST['id_description'];
        $new_description = $_POST['description'];

        CatalogsModel::editDescription($nameCatalog, $columns[0], $columns[1], $new_description, $id_description);

        echo '';
    }
}
