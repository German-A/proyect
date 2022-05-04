<?php

require_once "../controladores/empleo.controlador.php";
require_once "../modelos/empleo.modelo.php";

class AjaxEmpleos
{

    public $idProducto;
    public $NombrePuesto;
    public $FechaInico;
    public $FechaFin;


    public function ajaxEliminarEmpleo()
    {
        $item  = "idEmpleos";
        $valor = $this->idProducto;
        $respuesta = ControladorEmpleo::ctrEliminarEmpleo($item, $valor);
        echo json_encode($respuesta);
    }


    public function ajaxRegistroEmpleo()
    {
        $item  = "idEmpleos";
        $valor = $this->idProducto;

        $idEmpresa = $_POST['idEmpresa'];
        $NombrePuesto = $_POST['NombrePuesto'];
        $DescripcionPuesto = $_POST['DescripcionPuesto'];
        $InformacionAdicional = $_POST['InformacionAdicional'];
        $LugarTrabajo = $_POST['LugarTrabajo'];
        $TrabajoRemoto = $_POST['TrabajoRemoto'];
        $NumeroVacantes = $_POST['NumeroVacantes'];
        $Competencias = $_POST['Competencias'];
        $Experiencias = $_POST['Experiencias'];
        $TipoContrato = $_POST['TipoContrato'];
        $JornadaLaboral = $_POST['JornadaLaboral'];
        $HorasSemanales = $_POST['HorasSemanales'];
        $HorarioTrabajo = $_POST['HorarioTrabajo'];
        $RemuneracionBruta = $_POST['RemuneracionBruta'];
        $Contacto = $_POST['Contacto'];
        $FechaInico = $_POST['FechaInico'];
        $FechaFin = $_POST['FechaFin'];

        $Idiomas = [];
        $Idiomas = $_POST['Idiomas'];

        $marcas = [];
        $marcas = $_POST['marcas'];

        $titulaciones = [];
        $titulaciones = $_POST['titulaciones'];

        $nombreCompetencias = [];
        $nombreCompetencias = $_POST['nombreCompetencias'];





        $FechaInico = $this->FechaInico;
        $FechaFin = $this->FechaFin;
        $respuesta = ControladorEmpleo::ctrRegistroEmpleo($item, $valor, $NombrePuesto, $DescripcionPuesto, $InformacionAdicional, $LugarTrabajo, $TrabajoRemoto, $NumeroVacantes, $Competencias, $Idiomas, $Experiencias, $TipoContrato, $JornadaLaboral, $HorasSemanales, $HorarioTrabajo, $RemuneracionBruta, $Contacto, $FechaInico, $FechaFin, $marcas, $titulaciones, $nombreCompetencias,$idEmpresa);
        echo json_encode($respuesta);
    }


    public function ajaxSuspenderEmpleo()
    {
        $item  = "idEmpleos";
        $valor = $this->idProducto;

        $idEmpleo = $_POST['EmpleoSupender'];

        $respuesta = ControladorEmpleo::ctrSuspenderEmpleo($idEmpleo);
        echo json_encode($respuesta);
    }
    public function ajaxAprobarEmpleo()
    {
    

        $idEmpleo = $_POST['EmpleoAprobar'];

        $respuesta = ControladorEmpleo::ctrAprobarEmpleo($idEmpleo);
        echo json_encode($respuesta);
    }



    
    
}

/*=============================================
    ELIMINAR EMPLEO
=============================================*/

if (isset($_POST["eliminar"])) {
    $traerProducto             = new AjaxEmpleos();
    $traerProducto->idProducto = $_POST["eliminar"];
    $traerProducto->ajaxEliminarEmpleo();
}

/*=============================================
    REGISTRO EMPLEO
=============================================*/

if (isset($_POST["accion"])) {
    $traerProducto             = new AjaxEmpleos();
    $traerProducto->FechaInico = $_POST["FechaInico"];
    $traerProducto->FechaFin = $_POST["FechaFin"];
    $traerProducto->ajaxRegistroEmpleo();
}

if (isset($_POST["accion"])) {
    $traerProducto             = new AjaxEmpleos();
    $traerProducto->FechaInico = $_POST["FechaInico"];
    $traerProducto->FechaFin = $_POST["FechaFin"];
    $traerProducto->ajaxRegistroEmpleo();
}

if (isset($_POST["EmpleoSupender"])) {
    $traerProducto             = new AjaxEmpleos();

    $traerProducto->ajaxSuspenderEmpleo();
}

if (isset($_POST["EmpleoAprobar"])) {
    $traerProducto             = new AjaxEmpleos();

    $traerProducto->ajaxAprobarEmpleo();
}




