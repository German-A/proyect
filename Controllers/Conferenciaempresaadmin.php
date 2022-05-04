<?php

class conferenciaempresaadmin extends Controllers
{
	private $idEmpresa;
	
	public function __construct()
	{
		
		session_start();
		//session_regenerate_id(true);
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(10);
	}
	//pagina Banner
	public function conferenciaempresaadmin($i)
	{
		$this->idEmpresa=$i;
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Conferencias";
		$data['idempresa'] = $this->idEmpresa;
		$data['page_title'] = "Conferencias<small> Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-Conferencias";
		$data['page_functions_js'] = "functions_conferenciaadmin.js";
		$this->views->getView($this, "conferenciaempresaadmin", $data);
	}
	//listado de los banners
	public function getBanners($i)
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->listadoConferencia($i);
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewBanner(' . $arrData[$i]['idConferencia'] . ')" title="Ver Banner"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					if (($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
						($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1)
					) {
						$btnEdit = '<button class="btn btn-primary  btn-sm fntEditBanner" onClick="fntEditBanner(this,' . $arrData[$i]['idConferencia'] . ')" title="Editar Banner"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
						($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1)
					) {
						$btnDelete = '<button class="btn btn-danger btn-sm fntDelBanner" onClick="fntDelBanner(' . $arrData[$i]['idConferencia'] . ')" title="Eliminar Banner"><i class="far fa-trash-alt"></i></button>';
					} else {
						$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
					}
				}
				$arrData[$i]['fotoExpositor'] = '<a href="' . base_url() . '/Assets/archivos/conferencia/' . $arrData[$i]['fotoExpositor'] . '"target="_blank"><span class="badge badge-primary"  >' . $arrData[$i]['fotoExpositor'] . '</span></a> ';
				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//insertar y actualizar los Banners
	public function setConferecnia()
	{
		if ($_POST) {
			if (empty($_POST['nombreConferencia'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en el Banner.');
			} else {
				$idConferencia = intval($_POST['idBanner']);

				$nombreConferencia = trim($_POST['nombreConferencia']);
				$fechaConferencia = trim($_POST['fechaConferencia']);
				$nombreExpositor = trim($_POST['nombreExpositor']);
				$cargoExpositor = trim($_POST['cargoExpositor']);
				$linkConferencia = trim($_POST['linkConferencia']);
				$idEmpresa = trim($_POST['idEmpresa']);

				$request_user = "";
				if ($idConferencia == 0) {

					$option = 1;

					$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
					$nombre = $_FILES['archivoSubido']['name'];

					$nuevonombre = $nombreExpositor . $nombre;

					if (!file_exists('Assets/archivos/conferencia/')) {
						mkdir('Assets/archivos/conferencia/', 0777, true);
						if (file_exists('Assets/archivos/conferencia/')) {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/conferencia/' . $nuevonombre)) {
								$insert = $this->model->insertBanner($nombreConferencia, $fechaConferencia, $nombreExpositor, $cargoExpositor, $linkConferencia, $nuevonombre,$idEmpresa);
							} else {
								echo "no se pudo guardar";
							}
						}
					} else {
						if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/conferencia/' . $nuevonombre)) {
							$insert = $this->model->insertBanner($nombreConferencia, $fechaConferencia, $nombreExpositor, $cargoExpositor, $linkConferencia, $nuevonombre,$idEmpresa);
						} else {
							echo "no se pudo guardar";
						}
					}
				} else {
					$option = 2;

					if ($_FILES['archivoSubido']['name']=="") {
						$insert = $this->model->updateConferencia($nombreConferencia, $fechaConferencia, $nombreExpositor, $cargoExpositor, $linkConferencia,$idEmpresa,$idConferencia);
					} else{

						$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
						$nombre = $_FILES['archivoSubido']['name'];
	
						$nuevonombre = $nombreExpositor . $nombre;
	
						if (!file_exists('Assets/archivos/conferencia/')) {
							mkdir('Assets/archivos/conferencia/', 0777, true);
							if (file_exists('Assets/archivos/conferencia/')) {
								if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/conferencia/' . $nuevonombre)) {
									$insert = $this->model->updateBanner($nombreConferencia, $fechaConferencia, $nombreExpositor, $cargoExpositor, $linkConferencia, $nuevonombre,$idEmpresa,$idConferencia);
								} else {
									echo "no se pudo guardar";
								}
							}
						} else {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/conferencia/' . $nuevonombre)) {
								$insert = $this->model->updateBanner($nombreConferencia, $fechaConferencia, $nombreExpositor, $cargoExpositor, $linkConferencia, $nuevonombre,$idEmpresa,$idConferencia);
							} else {
								echo "no se pudo guardarrr";
							}
						}


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
			$idusuario = intval($idpersona);
			if ($idusuario > 0) {
				$arrData = $this->model->getunBanner($idusuario);
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
				$IdBaner = intval($_POST['IdBaner']);
				$NombreArchivo= $this->model->getunBanner($IdBaner);
					//borrar documentos
				$requestDelete = $this->model->deleteBanner($IdBaner);
				@unlink('Assets/archivos/conferencia/'.$NombreArchivo['fotoExpositor']);
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
