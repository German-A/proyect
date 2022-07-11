<?php

class objetivoseducacionales extends Controllers
{
	public function __construct()
	{
		session_start();
		//session_regenerate_id(true);
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(3);
	}
	//pagina Banner
	public function objetivoseducacionales()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Banner";
		$data['page_title'] = "Banner <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-banner";
		$data['page_functions_js'] = "functions_objetivoseducacionales.js";
		$this->views->getView($this, "objetivoseducacionales", $data);
	}

	//insertar y actualizar los Banners
	public function set()
	{
		if ($_POST) {
			if (empty($_POST['textObjetivos'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			} else {
				$idOjetivo = intval($_POST['id']);
				$tarea = trim($_POST['textObjetivos']);
				$personaid =$_SESSION['idUser'];
				$cursoobjetivosid =1;
				
				/*buscar si hay un usuario registrado*/
				$personaid = $this->model->buscarusuario($personaid);
		
				if ($idEmpresa > 0) {
					$arrData = array('status' => true, 'data' => $idEmpresa);
				} else {
					$arrData = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}


				$request_user = "";
				if ($idOjetivo == 0) {
					$option = 1;
					$insert = $this->model->register($tarea,$personaid,$cursoobjetivosid);				
				} else {
					$option = 2;

					$insert = $this->model->toupdate($tarea,$personaid,$cursoobjetivosid);			

				}

				if ($insert > 0) {
					if ($option == 1) {
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











	//listado de los banners
	public function get()
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->lista();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm fntView" onClick="fntView(' . $arrData[$i]['IdBaner'] . ')" title="Ver Banner"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
						$btnEdit = '<button class="btn btn-primary  btn-sm fntEdit" onClick="fntEdit(this,' . $arrData[$i]['IdBaner'] . ')" title="Editar Banner"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
						$btnDelete = '<button class="btn btn-danger btn-sm fntDelete" onClick="fntDelete(' . $arrData[$i]['IdBaner'] . ')" title="Eliminar Banner"><i class="far fa-trash-alt"></i></button>';
					} else {
						$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
					}
				}
				$arrData[$i]['NombreArchivo'] = '<a href="' . base_url() . '/Assets/archivos/banner/' . $arrData[$i]['NombreArchivo'] . '"target="_blank"><span class="badge badge-primary"  >' . $arrData[$i]['NombreArchivo'] . '</span></a> ';

				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}



	//obtener un baner para actualizar
	public function getone($idpersona)
	{
		if ($_SESSION['permisosMod']['r']) {
			$idusuario = intval($idpersona);
			if ($idusuario > 0) {
				$arrData = $this->model->getOne($idusuario);
				if (empty($arrData)) {
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				} else {
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	//borrar un banner
	public function delete()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$IdBaner = intval($_POST['IdBaner']);
				$NombreArchivo = $this->model->getOne($IdBaner);
				//borrar documentos
				$requestDelete = $this->model->remove($IdBaner);
				@unlink('Assets/archivos/banner/' . $NombreArchivo['NombreArchivo']);
				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Banner');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Bnner.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}
}
