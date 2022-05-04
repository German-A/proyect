<?php

class Conexion
{

    public static function conectar()
    {

        $link = new PDO("mysql:host=localhost;dbname=mxxxloaw_use-unt", "mxxxloaw_useadmin", "useadmin#$#$", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND                                                                   => "SET NAMES utf8"));
        return $link;
    }
}
