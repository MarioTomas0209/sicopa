<?php

if (isset($_POST['action'])) {

    require_once "../models/datperson.model.php";
    $ControllerPersonalData = new ControllerPersonalData;

    switch ($_POST['action']) {
        case 'getDataPerson': $ControllerPersonalData -> getDataPerson();break;
        case 'getDataTable': $ControllerPersonalData -> getDataTable();break;
        case 'add': $ControllerPersonalData -> addPerson();break;
        case 'delete': $ControllerPersonalData -> deletePerson();break;
        case 'edit': $ControllerPersonalData -> editPerson();break;
        case 'existsCURP':$ControllerPersonalData -> existsCURP();break;
        case 'deleteByCurp':$ControllerPersonalData -> deleteByCurp();break;
        case 'existsUser':$ControllerPersonalData -> existsUser();break;
    }

}

class ControllerPersonalData {

    public static function getTipPerson() {
        return ModelPersonalData::getTipPerson();
    }

    public static function getNames() {
        return ModelPersonalData::getNames();
    }

    public static function getLastNames() {
        return ModelPersonalData::getLastNames();
    }

    public static function getGenders() {
        return ModelPersonalData::getGenders();
    }

    public static function getStreets() {
        return ModelPersonalData::getStreets();
    }

    public static function getColonies() {
        return ModelPersonalData::getColonies();
    }

    public static function getMunicipalities() {
        return ModelPersonalData::getMunicipalities();
    }

    public static function getStates() {
        return ModelPersonalData::getStates();
    }

    public static function getDataPerson() {
        $id = $_POST['id'];

        $data = ModelPersonalData::getDataPerson($id);
        $data_array = array(
            "CvPerson"    => $data[0],
            "CvTipPerson" => $data[1],
            "Curp"        => $data[2],
            "Rfc"         => $data[3],
            "Email"       => $data[4],
            "CvNombre"    => $data[5],
            "CvApePat"    => $data[6],
            "CvApeMat"    => $data[7],
            "FecNac"      => $data[8],
            "CvGenero"    => $data[9],
            "Telefono"    => $data[10],
            "CvEstado"    => $data[11],
            "CvMunicipio" => $data[12],
            "CvColonia"   => $data[13],
            "CvCalle"     => $data[14],
            "Numero"      => $data[15],
            "Cp"          => $data[16],
        );

        echo json_encode($data_array);
    }

    public static function getDataTable() {
        
        if (isset($_POST['action'])) {
            $data = ModelPersonalData::getDataTable();

            $rows = '';
            $attributes = 'class="filasTablita" onclick="selectRow(this.id);"';

            foreach ($data as $value) {
                $id = 'id="'.$value[0].'"';
                $rows = $rows."<tr $attributes $id> 
                                   <td>$value[1]</td>
                                   <td>$value[2]</td>
                                   <td>$value[3]</td>
                                   <td>$value[4]</td>
                                   <td>$value[5]</td>
                                   <td>$value[6]</td>
                                   <td>$value[7]</td>
                                   <td>$value[8]</td>
                                   <td>$value[9]</td>
                                   <td>$value[10]</td> 
                               </tr>";
            }

            echo $rows;
        }
        
        return ModelPersonalData::getDataTable();
    }

    function addPerson() {
        $TipPerson = $_POST['TipPerson'];

        $Name = $_POST['Name'];
        $LastName = $_POST['LastName'];
        $MotherLastName = $_POST['MotherLastName'];
        $Date = $_POST['Date'];
        $Gender = $_POST['Gender'];
        $Phone = $_POST['Phone'];
        $Email = $_POST['Email'];
        $Curp = $_POST['Curp'];
        $Rfc = $_POST['Rfc'];

        $State = $_POST['State'];
        $Municipality = $_POST['Municipality'];
        $Suburb = $_POST['Suburb'];
        $Street = $_POST['Street'];
        $Number = $_POST['Number'];
        $PostalCode = $_POST['PostalCode'];

        if ($Number == '') {
            $Number = 'S/n';
        }

        ModelPersonalData::addNewPerson($TipPerson, $Name, $LastName, $MotherLastName, $Date, $Gender, $Phone, $Email, $Curp, $Rfc, $State, $Municipality, $Suburb, $Street, $Number, $PostalCode);

        echo '';
    }

    function deletePerson() {
        $CvPerson = $_POST['id'];

        ModelPersonalData::deletePerson($CvPerson);
        echo '';
    }

    function editPerson() {
        $CvPerson = $_POST['CvPerson'];

        $TipPerson = $_POST['TipPerson'];

        $Name = $_POST['Name'];
        $LastName = $_POST['LastName'];
        $MotherLastName = $_POST['MotherLastName'];
        $Date = $_POST['Date'];
        $Gender = $_POST['Gender'];
        $Phone = $_POST['Phone'];
        $Email = $_POST['Email'];
        $Curp = $_POST['Curp'];
        $Rfc = $_POST['Rfc'];

        $State = $_POST['State'];
        $Municipality = $_POST['Municipality'];
        $Suburb = $_POST['Suburb'];
        $Street = $_POST['Street'];
        $Number = $_POST['Number'];
        $PostalCode = $_POST['PostalCode'];

        if ($Number == '') {
            $Number = 'S/n';
        }

        ModelPersonalData::editPerson($CvPerson, $TipPerson, $Name, $LastName, $MotherLastName, $Date, $Gender, $Phone, $Email, $Curp, $Rfc, $State, $Municipality, $Suburb, $Street, $Number, $PostalCode);
        echo '';
    }

    public static function existsCURP() {
        $value = ModelPersonalData::existsCURP($_POST['curp']);
        if($value){echo json_encode($value);}else{echo '';}
    }

    function deleteByCurp() {
        ModelPersonalData::deleteByCurp($_POST['CvPerson']);
        echo '';
    }

    function existsUser() {
        $CvPerson = $_POST['id'];
        $e = ModelPersonalData::existsUser($CvPerson);

        echo json_encode($e);
    }

}