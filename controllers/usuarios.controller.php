<?php

if (isset($_POST['action'])) {

    require_once "../models/usuarios.model.php";
    $ControllerUsuarios = new ControllerUsuarios;

    switch ($_POST['action']) {
        case 'addNewUser': $ControllerUsuarios -> addNewUser();break;
        case 'getUsers': $ControllerUsuarios -> getUsers();break;
        case 'getDataUser': $ControllerUsuarios -> getDataUser();break;
        case 'delete' : $ControllerUsuarios -> deleteUser();break;
        case 'edit' : $ControllerUsuarios -> editUser();break;
        case 'validateUsername': $ControllerUsuarios -> validateUsername();break;
    }

}

class ControllerUsuarios {

    public static function Login() {
        if (isset($_POST['email'])) {
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['email']) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST['password'])) {

                $Login = $_POST['email'];

                if ($Login == 'admin' && $_POST['password'] == 'admin') {
                    $_SESSION['is_login'] = 'true';
                    $_SESSION['CvUser'] = 1;
                    $_SESSION['nombre'] = 'Administrador';
                    $_SESSION['apellido'] = 'Admin';
                    echo '<script>window.location = "main"</script>';
                    return;
                }

                $User = ModelUsuarios::getUser($Login);

                if ($User && $User['password'] == $_POST['password']) {

                    if ($User['edocta'] == 1) {

                        $now = date("Y-m-d");
                        $FecIni = $User['fecini'];
                        $FecFin = $User['fecfin'];

                        if ($now >= $FecIni) {

                            if ($now <= $FecFin) {    
                                $_SESSION['is_login'] = 'true';
                                $_SESSION['CvUser'] = $User['cvuser'];
                                $_SESSION['CvPerson'] = $User['cvperson'];
                                $_SESSION['login'] = $User['login'];
                                $_SESSION['nombre'] = $User['dsnombre'];
                                $_SESSION['apellido'] = $User['dsapellido'];
        
                                echo '<script>window.location = "main"</script>';
                            } else {
                                echo '<br><div class="alert alert-danger">Cuenta vencida, contacte al administrador</div>';
                                ModelUsuarios::disableEdoCta($User['cvuser'], 0);
                            }

                        } else {
                            echo '<br><div class="alert alert-danger">Cuenta por activar, contacte al administrador</div>';
                        }

                    } else {
                        echo '<br><div class="alert alert-danger">Cuenta desactivada, contacte al administrador</div>';
                    }
                    

                } else {
                    echo '<br><div class="alert alert-danger">Error a ingresar, vuelve a internarlo</div>';
                }
            }
        }
    }

    public static function getPeople() {
        return ModelUsuarios::getPeople();
    }

    public static function getUsers() {
        $Users = ModelUsuarios::getUsers();

        foreach ($Users as $key => $User) {

            if ($User['CvUser'] == 1) {
                $Users[$key]['CvPerson'] = 'Administrador';
                $Users[$key][1] = 'Administrador';
            } else {
                $NombreCompleto = ModelUsuarios::getPerson($User[1]);
                $Users[$key]['CvPerson'] = $NombreCompleto[0] . ' ' . $NombreCompleto[1] . ' ' . $NombreCompleto[2];
                $Users[$key][1] = $NombreCompleto[0] . ' ' . $NombreCompleto[1] . ' ' . $NombreCompleto[2];
            }
        }

        if (isset($_POST['action'])) {

            $rows = '';
            $attributes = 'class="filasTablita" onclick="selectRow(this.id);"';

            foreach ($Users as $value) {
                $id = 'id="'.$value[0].'"';
                $rows = $rows."<tr $attributes $id>
                                   <td>$value[0]</td> 
                                   <td id=".'"NombreUser"'.">$value[1]</td>
                                   <td>$value[2]</td>
                                   <td>**********</td>
                                   <td>$value[4]</td>
                                   <td>$value[5]</td>";
                                if ($value[6] == 1) {
                $rows = $rows.     '<td><b class="text-success">Activado</b></td>';
                                } else {
                $rows = $rows.     '<td><b class="text-danger">Desactivado</b></td>';
                                }
                $rows = $rows.     "</tr>";
            }

            echo $rows;
        }

        return $Users;
    }

    public static function addNewUser() {
        $CvUser = 0;
        $CvPerson = $_POST['NameUser'];
        $Login    = $_POST['Login'];
        $Password = $_POST['Password'];
        $FecIni   = $_POST['FecIni'];
        $FecFin   = $_POST['FecFin'];
        $EdoCta   = $_POST['EdoCta'];
        if ($EdoCta=='true'){$EdoCta=1;}else{$EdoCta=0;}

        ModelUsuarios::addNewUser($CvUser, $CvPerson, $Login, $Password, $FecIni, $FecFin, $EdoCta);

        echo '';
    }

    public static function getDataUser() {
        $id = $_POST['id'];

        $data = ModelUsuarios::getDataUser($id);

        $data_array = array(
            "CvUser"      => $data[0],
            "CvPerson"    => $data[1],
            "Login"       => $data[2],
            "Password"    => $data[3],
            "FecIni"      => $data[4],
            "FecFin"      => $data[5],
            "EdoCta"      => $data[6]
        );

        echo json_encode($data_array);
    }

    public static function deleteUser() {
        $CvUser = $_POST['id'];

        ModelUsuarios::deleteUser($CvUser);
        echo '';
    }

    public static function editUser() {
        $CvUser   = $_POST['CvUser'];
        $CvPerson = $_POST['NameUser'];
        $Login    = $_POST['Login'];
        $Password = $_POST['Password'];
        $FecIni   = $_POST['FecIni'];
        $FecFin   = $_POST['FecFin'];
        $EdoCta   = $_POST['EdoCta'];
        if ($EdoCta=='true'){$EdoCta=1;}else{$EdoCta=0;}

        ModelUsuarios::editUser($CvUser, $CvPerson, $Login, $Password, $FecIni, $FecFin, $EdoCta);
        echo '';
    }

    public static function validateUsername() {

        $Login = $_POST['Username'];
        $Password = $_POST['Password'];

        $eLogin = ModelUsuarios::validateUsername($Login);
        $ePassword = ModelUsuarios::validatePassword($Password);

        if (isset($_POST['e'])) {
            $User = ModelUsuarios::getUserById($_POST['e']);

            if ($User['Login'] == $Login && $User['Password'] == $Password) {
                echo 'none';
            } else if ($User['Login'] != $Login) {

                if ($eLogin) {
                    echo 'username';
                } else {
                    echo 'none';
                }

            } else if ($User['Password'] != $Password) {

                if ($ePassword) {
                    echo 'password';
                } else {
                    echo 'none';
                }

            } else {

                if ($eLogin) {
                    echo 'username';
                } else if ($ePassword) {
                    echo 'password';
                } else {
                    echo 'none';
                }

            }
        } else {

            if ($eLogin) {
                echo 'username';
            } else if ($ePassword) {
                echo 'password';
            } else {
                echo 'none';
            }

        }
    }
}