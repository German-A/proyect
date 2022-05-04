<?php

require_once "../controladores/empresa.Controlador.php";
require_once "../modelos/empresa.Modelo.php";

class AjaxEmpresa
{

    public $idProducto;
    public $NombrePuesto;
    public $FechaInico;
    public $FechaFin;

    public function ajaxRegistroEmpresa()
    {
        $item  = "idEmpleos";
        
			$NombreUsuario = $_POST['NombreUsuario'];
			$ApellidoPaterno = $_POST['ApellidoPaterno'];
			$ApellidoMaterno = $_POST['ApellidoMaterno'];
			$Imagen = $_POST['Imagen'];
			$dni = $_POST['dni'];
			$Celular = $_POST['Celular'];
			$Clave = $_POST['Clave'];
			$Correo = $_POST['Correo'];
			$NombreEmpresa = $_POST['NombreEmpresa'];
			$Ruc = $_POST['Ruc'];
			$logoEmpresa = $_POST['logoEmpresa'];
			$Direccion = $_POST['Direccion'];

			$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
			$logoEmpresa = $_FILES['archivoSubido']['name'];
			$nuevonombre = $logoEmpresa;

			if (!file_exists('archivos/conferencias/')) {
				mkdir('archivos/conferencias/', 0777, true);
				if (file_exists('archivos/conferencias/')) {
					if (move_uploaded_file($ubicacionTemporal, 'archivos/conferencias/' . $nuevonombre)) {

						echo "guardado con exito";
					} else {
						echo "no se pudo guardar";
					}
				}
			} else {
				if (move_uploaded_file($ubicacionTemporal, 'archivos/conferencias/' . $nuevonombre)) {

					echo "guardado con exito";
				} else {
					echo "no se pudo guardar";
				}
			}
            
         
            $respuesta = ControladorEmpresa::RegistroEmpresa($NombreUsuario, $ApellidoPaterno, $ApellidoMaterno, $Imagen, $dni, $Celular, $Clave, $Correo,$NombreEmpresa, $Ruc, $nuevonombre, $Direccion);
        echo json_encode($respuesta);
    }



	public function ajaxRegistroConferencia()
    {
    
        
			$idEmpresa = $_POST['idEmpresa'];
			$nombreConferencia = $_POST['nombreConferencia'];
			$fechaConferencia = $_POST['fechaConferencia'];
			$nombreExpositor = $_POST['nombreExpositor'];
			$linkConferencia = $_POST['linkConferencia'];
			$cargoExpositor = $_POST['cargoExpositor'];


			$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
			$logoEmpresa = $_FILES['archivoSubido']['name'];
			$nuevonombre = $logoEmpresa;

			if (!file_exists('archivos/conferencias/')) {
				mkdir('archivos/conferencias/', 0777, true);
				if (file_exists('archivos/conferencias/')) {
					if (move_uploaded_file($ubicacionTemporal, 'archivos/conferencias/' . $nuevonombre)) {

						echo "guardado con exito";
					} else {
						echo "no se pudo guardar";
					}
				}
			} else {
				if (move_uploaded_file($ubicacionTemporal, 'archivos/conferencias/' . $nuevonombre)) {

					echo "guardado con exito";
				} else {
					echo "no se pudo guardar";
				}
			}
            
         
            $respuesta = ControladorEmpresa::RegistroConferencia($idEmpresa, $nombreConferencia, $fechaConferencia, $nombreExpositor, $linkConferencia, $cargoExpositor, $nuevonombre);
        	echo json_encode($respuesta);
    }

	
    public function ajaxIdEmpresa()
    {

        $idEmpresa = $_POST['Empresa'];

		$_SESSION["idEmpresa"] = $_POST['Empresa'];


        $respuesta = ControladorEmpresa::obtenerIdEmpresa($idEmpresa);


        echo json_encode($respuesta);
    }

}



/*=============================================
    REGISTRO EMPLEO
=============================================*/

if ($_POST["accion"]=='REGISTRAR_EMPRESA') {
    $traerProducto             = new AjaxEmpresa();
    $traerProducto->ajaxRegistroEmpresa();
}


if ($_POST["accion"]=='REGISTRAR_CONFERENCIA') {
    $traerProducto             = new AjaxEmpresa();
    $traerProducto->ajaxRegistroConferencia();
}

if (isset($_POST["Empresa"])) {
    $traerProducto             = new AjaxEmpresa();
    $traerProducto->ajaxIdEmpresa();
}



