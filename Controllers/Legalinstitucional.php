<?php

class legalinstitucional extends Controllers
{
	public function __construct()
	{
		session_start();
		parent::__construct();
		
		session_regenerate_id(true);
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(3);
	}

	public function legalinstitucional()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Legalinstitucional";
		$data['page_title'] = "Legalinstitucional <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "Legalinstitucional";
		$data['page_functions_js'] = "functions_legalinstitucional.js";
		$this->views->getView($this, "legalinstitucional", $data);
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
					$btnView = '<button class="btn btn-info btn-sm fntView" onClick="fntView(' . $arrData[$i]['IdInstitucional'] . ')" title="Ver Legal"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					if (( $_SESSION['userData']['idrol'] == 1) ||( $_SESSION['userData']['idrol'] == 2)) {
						$btnEdit = '<button class="btn btn-primary  btn-sm fntEdit" onClick="fntEdit(this,' . $arrData[$i]['IdInstitucional'] . ')" title="Editar Legal"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (( $_SESSION['userData']['idrol'] == 1) ||( $_SESSION['userData']['idrol'] == 2)) {
						$btnDelete = '<button class="btn btn-danger btn-sm fntDelete" onClick="fntDelete(' . $arrData[$i]['IdInstitucional'] . ')" title="Eliminar Legal"><i class="far fa-trash-alt"></i></button>';
					} else {
						$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
					}
				}
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
			if (empty($_POST['txtNombre'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en el Banner.');
			} else {
				$idUsuario = intval($_POST['id']);
				$posicion = $_POST['posicion'];
				$nombreArchivo = trim($_POST['txtNombre']);

				$request_user = "";
				if ($idUsuario == 0) {

					$option = 1;

					$cantidadBanner = "";
					$cantidadBanner = $this->model->cantidadBanner();
					$cantidad = $cantidadBanner['cant'];
					$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
					$nombre = $_FILES['archivoSubido']['name'];

					$nuevonombre = $cantidad . $nombre;

					if ($cantidad == null) {
						$cantidad = 0;
					} else {
						$cantidad++;
					}

					if (!file_exists('Assets/archivos/documentoslegales/')) {
						mkdir('Assets/archivos/documentoslegales/', 0777, true);
						if (file_exists('Assets/archivos/documentoslegales/')) {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/documentoslegales/' . $nuevonombre)) {
								$insert = $this->model->register($nombreArchivo, $nuevonombre, $cantidad, $posicion);
							} else {
								echo "no se pudo guardar ";
							}
						}
					} else {
						if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/documentoslegales/' . $nuevonombre)) {
							$insert = $this->model->register($nombreArchivo, $nuevonombre, $cantidad, $posicion);
						} else {
							echo "no se pudo guardar";
						}
					}
				} else {
					$option = 2;

					$cantidadBanner = "";
					$cantidadBanner = $this->model->cantidadBanner();

					//$nombre = null;

					if ($_FILES['archivoSubido']['name']=="") {
						$insert = $this->model->updatePosicion($nombreArchivo, $idUsuario, $posicion);
					} else{
						
						$cantidad = $cantidadBanner['cant'];
						$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
						$nombre = $_FILES['archivoSubido']['name'];
						$nuevonombre = $cantidad . $nombre;
						$nombreArchivo = trim($_POST['txtNombre']);
						if ($cantidad == null) {
							$cantidad = 0;
						} else {
							$cantidad++;
						}

						if (!file_exists('Assets/archivos/documentoslegales/')) {
							mkdir('Assets/archivos/documentoslegales/', 0777, true);
							if (file_exists('Assets/archivos/documentoslegales/')) {
								if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/documentoslegales/' . $nuevonombre)) {
									$insert = $this->model->toupdate($nombreArchivo, $nuevonombre, $cantidad, $idUsuario, $posicion);
								} else {
									echo "no se pudo guardar ";
								}
							}
						} else {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/documentoslegales/' . $nuevonombre)) {
								$insert = $this->model->toupdate($nombreArchivo, $nuevonombre, $cantidad, $idUsuario, $posicion);
							} else {
								echo "no se pudo guardar";
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
	public function getOne($idpersona)
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
				$IdBaner = intval($_POST['IdNacional']);
				$NombreArchivo= $this->model->getOne($IdBaner);
				//borrar documentos
				$requestDelete = $this->model->remove($IdBaner);
				@unlink('Assets/archivos/documentoslegales/'.$NombreArchivo['NombreArchivo']);
				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Documento Institucional');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Documento Institucional.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}
}
