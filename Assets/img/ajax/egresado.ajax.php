<?php

require_once "../controladores/alumnos.Controlador.php";
require_once "../modelos/alumno.Modelo.php";

class AjaxEgresado
{

    public $idProducto;
    public $NombrePuesto;
    public $FechaInico;
    public $FechaFin;

    public function ajaxRegistroEgresado()
    {

        $Nombres = $_POST['Nombres'];
        $ApellidoP = $_POST['ApellidoP'];
        $ApellidoM = $_POST['ApellidoM'];
        $Imagen = $_POST['Imagen'];
        $Dni = $_POST['Dni'];
        $Celular = $_POST['Celular'];

        $Clave = $_POST['Clave'];
        $Correo = $_POST['Correo'];

        $respuesta = ControladorAlumno::RegistrarAlumno($Nombres, $ApellidoP, $ApellidoM, $Imagen, $Celular, $Dni, $Clave, $Correo);


        echo json_encode($respuesta);
    }
}



/*=============================================
    REGISTRO EMPLEO
=============================================*/

if (isset($_POST["accion"])) {
    $traerProducto             = new AjaxEgresado();
    $traerProducto->ajaxRegistroEgresado();
}


