<?php

class difusion extends Controllers
{
	private $idempleo;
	public function __construct()
	{
		session_start();
		//session_regenerate_id(true);
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(18);
	}
	//pagina Banner
	public function difusion()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "difusion";
		$data['page_title'] = "difusion <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-difusion";

		$data['page_functions_js'] = "functions_difusion.js";
		$this->views->getView($this, "difusion", $data);
	}
	//listado
	public function getDifusion()
	{

		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->getDifusion();


			for ($i = 0; $i < count($arrData); $i++) {

				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				if ($arrData[$i]['status'] == 0) {
					$arrData[$i]['status'] = '<span class="badge badge-danger">Eliminado</span>';
				} else if ($arrData[$i]['status'] == 10) {
					$arrData[$i]['status'] = '<span class="badge badge-warning">Inactivo</span>';
				} else {
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}

				if ($_SESSION['permisos'][18]['r']) {
					$btnView = '<button class="btn btn-info btn-sm" onClick="fntView(' . $arrData[$i]['id_disusion'] . ')" title="Ver encuestas"><i class="far fa-eye"></i></button>';
				}

				if ($_SESSION['permisos'][18]['u']) {
					$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEdit(this,' . $arrData[$i]['id_disusion'] . ')" title="Editar encuesta"><i class="fas fa-pencil-alt"></i></button>';
				} else {
					$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
				}

				if ($_SESSION['permisos'][18]['d']) {
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="ftnDelete(' . $arrData[$i]['id_disusion'] . ')" title="Eliminar encuesta"><i class="far fa-trash-alt"></i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}

				$arrData[$i]['link'] = '<a href="javascript:void(0);" lin-oferta="' . $arrData[$i]['link'] . '"  onClick="copiarLinkOferta(this)" class="btn btn-secondary btn-sm" ><span>web</span></a> ';

				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//insertar y actualizar los Banners
	public function set()
	{
		if ($_POST) {
			if (empty($_POST['descripcion'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			} else {
				$id_disusion = intval(strClean($_POST['id']));
				$descripcion = strClean($_POST['descripcion']);
				$link = strClean($_POST['link']);

				$insert = "";

				if ($id_disusion == 0) {

					$option = 1;
					if ($_SESSION['permisosMod']['r']) {
						$insert = $this->model->newRegister($descripcion, $link);
					}
				} else {
					$option = 2;
					if ($_SESSION['permisosMod']['u']) {
						$insert = $this->model->newUpdate($id_disusion, $descripcion, $link);
					}
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

	//obtener un baner para actualizar
	public function getunBanner($idpersona)
	{
		if ($_SESSION['permisosMod']['r']) {
			$id_disusion = intval($idpersona);
			if ($id_disusion > 0) {
				$arrData = $this->model->getunBanner($id_disusion);
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
	public function delBanner()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$id = intval($_POST['id']);
				$requestDelete = $this->model->deleteBanner($id);
				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Banner');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Bnner.');
				}
				echo $arrResponse;
			}
		}
		die();
	}
}
