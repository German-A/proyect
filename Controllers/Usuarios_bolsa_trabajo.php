<?php

class Usuarios_bolsa_trabajo extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	//insertar y actualizar los Banners
	public function set()
	{
		if ($_POST) {
			if (empty($_POST['dni'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en el manualesyguias.');
			} else {
				$dni = intval($_POST['dni']);
				$nombre = strClean($_POST['nombre']);
				$escuela = strClean($_POST['escuela']);
				$celular = strClean($_POST['celular']);
				$email = strClean($_POST['email']);

				$insert = $this->model->register($dni, $nombre, $escuela, $celular, $email);


				if ($insert > 0) {
					if ($insert == 1) {
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					} else {
						$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
					}
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//obtener un baner para actualizar
	public function getone()
	{

		$dni = intval($_POST['dni_usuario']);

		$arrData = $this->model->getOne($dni);



		if (empty($arrData)) {
			$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
		} else {
			$arrResponse = array('status' => true, 'data' => $arrData);
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);


		die();
	}




	//borrar un banner
	public function delete()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$IdBaner = intval($_POST['IdNacional']);
				$NombreArchivo = $this->model->getOne($IdBaner);
				//borrar documentos
				$requestDelete = $this->model->remove($IdBaner);
				@unlink('Assets/archivos/documentoslegales/' . $NombreArchivo['NombreArchivo']);
				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el documento legal');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el documento legal.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}
}
