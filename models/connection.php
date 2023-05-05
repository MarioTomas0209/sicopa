<?php

class Conexion {

    static public function conectar() {

        $link = new PDO('mysql:host=localhost;dbname=sicopa', 'root', '');
        //$link = new PDO('mysql:host=files.000webhost.com;dbname=id17058736_admin', 'id17058736_root', 'pxpkzF6h6z0gmee~');
        $link -> exec('set names utf8');

        return $link;
    }

}