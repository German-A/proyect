<?php

class galeriavida2022 extends Controllers
{
	public function __construct()
	{
		session_start();
		//session_regenerate_id(true);
		parent::__construct();


		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(22);
	}

	public function galeriavida2022()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "USE-Galeriavida2022";
		$data['page_title'] = "Galeriavida 2022 <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "Galeriavida-2022";
		$data['page_functions_js'] = "functions_galeriavida2022.js";
		$this->views->getView($this, "galeriavida2022", $data);
	}

	//listado de los galeriavidaysaluds
	public function get()
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->lista();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm fntView" onClick="fntView(' . $arrData[$i]['IdBaner'] . ')" title="Ver galeriavidaysalud"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
						$btnEdit = '<button class="btn btn-primary  btn-sm fntEdit" onClick="fntEdit(this,' . $arrData[$i]['IdBaner'] . ')" title="Editar galeriavidaysalud"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
						$btnDelete = '<button class="btn btn-danger btn-sm fntDelete" onClick="fntDelete(' . $arrData[$i]['IdBaner'] . ')" title="Eliminar galeriavidaysalud"><i class="far fa-trash-alt"></i></button>';
					} else {
						$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
					}
				}
				$arrData[$i]['NombreArchivo'] = '<a href="' . base_url() . '/Assets/upload/galeriavidaysalud/' . $arrData[$i]['NombreArchivo'] . '"target="_blank"><span class="badge badge-primary"  >' . $arrData[$i]['NombreArchivo'] . '</span></a> ';

				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//insertar y actualizar los galeriavidaysaluds
	public function set()
	{
		if ($_POST) {
			if (empty($_POST['nombreArchivo'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en el galeriavidaysalud.');
			} else {
				$idUsuario = intval($_POST['id']);
				$posicion = $_POST['posicion'];
				$nombreArchivo = trim($_POST['nombreArchivo']);

				$request_user = "";
				$insert = null;
				if ($idUsuario == 0) {

					$tipo = $_FILES['archivoSubido']['type'];

					if ($tipo == "image/png" || $tipo == 'image/jpeg') {

						$option = 1;

						$cantidadgaleriavidaysalud = "";
						$cantidadgaleriavidaysalud = $this->model->cantidadBanner();
						$cantidad = $cantidadgaleriavidaysalud['cant'];
						$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
						$nombre = $_FILES['archivoSubido']['name'];

						$nuevonombre = $cantidad . $nombre;

						if ($cantidad == null) {
							$cantidad = 0;
						} else {
							$cantidad++;
						}

						if (!file_exists('Assets/upload/galeriavidaysalud/')) {
							mkdir('Assets/upload/galeriavidaysalud/', 0777, true);
							if (file_exists('Assets/upload/galeriavidaysalud/')) {
								if (move_uploaded_file($ubicacionTemporal, 'Assets/upload/galeriavidaysalud/' . $nuevonombre)) {
									$insert = $this->model->register($nombreArchivo, $nuevonombre, $cantidad, $posicion);
								} else {
									echo "no se pudo guardar ";
								}
							}
						} else {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/upload/galeriavidaysalud/' . $nuevonombre)) {
								$insert = $this->model->register($nombreArchivo, $nuevonombre, $cantidad, $posicion);
							} else {
								echo "no se pudo guardar";
							}
						}
					} else {

						$arrResponse = array("status" => false, "msg" => 'Solo se permiten archivos .jpg, .png.');
					}
				} else {
					$option = 2;

					$cantidadgaleriavidaysalud = "";
					$cantidadgaleriavidaysalud = $this->model->cantidadBanner();

					//$nombre = null;

					if ($_FILES['archivoSubido']['name'] == "") {
						$insert = $this->model->updatePosicion($nombreArchivo, $idUsuario, $posicion);
					} else {

						$tipo = $_FILES['archivoSubido']['type'];

						if ($tipo == "image/png" || $tipo == 'image/jpeg') {


							$cantidad = $cantidadgaleriavidaysalud['cant'];
							$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
							$nombre = $_FILES['archivoSubido']['name'];
							$nuevonombre = $cantidad . $nombre;
							$nombreArchivo = trim($_POST['txtNombre']);
							if ($cantidad == null) {
								$cantidad = 0;
							} else {
								$cantidad++;
							}

							if (!file_exists('Assets/upload/galeriavidaysalud/')) {
								mkdir('Assets/upload/galeriavidaysalud/', 0777, true);
								if (file_exists('Assets/upload/galeriavidaysalud/')) {
									if (move_uploaded_file($ubicacionTemporal, 'Assets/upload/galeriavidaysalud/' . $nuevonombre)) {
										$insert = $this->model->toupdate($nombreArchivo, $nuevonombre, $cantidad, $idUsuario, $posicion);
									} else {
										echo "no se pudo guardar ";
									}
								}
							} else {
								if (move_uploaded_file($ubicacionTemporal, 'Assets/upload/galeriavidaysalud/' . $nuevonombre)) {
									$insert = $this->model->toupdate($nombreArchivo, $nuevonombre, $cantidad, $idUsuario, $posicion);
								} else {
									echo "no se pudo guardar";
								}
							}
						} else {
							$arrResponse = array("status" => false, "msg" => 'Solo se permiten archivos .jpg, .png.');
						}
					}
				}

				if ($insert > 0) {
					if ($option == 1) {
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					} else {
						$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
					}
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
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

	//borrar un galeriavidaysalud
	public function delete()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$IdBaner = intval($_POST['IdBaner']);
				$NombreArchivo = $this->model->getOne($IdBaner);
				//borrar documentos
				$requestDelete = $this->model->remove($IdBaner);
				@unlink('Assets/upload/galeriavidaysalud/' . $NombreArchivo['NombreArchivo']);
				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el galeriavidaysalud');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Bnner.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}
}
