<?php

class empleos extends Controllers
{
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
	public function empleos()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Empleos";
		$data['page_title'] = "Empleos <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-Empleos";
		$data['page_functions_js'] = "functions_empleos.js";
		$this->views->getView($this, "empleos", $data);
	}
	//listado de los banners
	public function getBanners()
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->listadoBanner();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewBanner(' . $arrData[$i]['IdBaner'] . ')" title="Ver Banner"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					if (($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
						($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1)
					) {
						$btnEdit = '<button class="btn btn-primary  btn-sm fntEditBanner" onClick="fntEditBanner(this,' . $arrData[$i]['IdBaner'] . ')" title="Editar Banner"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
						($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1)
					) {
						$btnDelete = '<button class="btn btn-danger btn-sm fntDelBanner" onClick="fntDelBanner(' . $arrData[$i]['IdBaner'] . ')" title="Eliminar Banner"><i class="far fa-trash-alt"></i></button>';
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
	public function setBanner()
	{
		if ($_POST) {
			if (empty($_POST['txtNombre'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en el Banner.');
			} else {
				$idUsuario = intval($_POST['idBanner']);
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

					if (!file_exists('Assets/archivos/banner/')) {
						mkdir('Assets/archivos/banner/', 0777, true);
						if (file_exists('Assets/archivos/banner/')) {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/banner/' . $nuevonombre)) {
								$insert = $this->model->insertBanner($nombreArchivo, $nuevonombre, $cantidad, $posicion);
							} else {
								echo "no se pudo guardar ";
							}
						}
					} else {
						if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/banner/' . $nuevonombre)) {
							$insert = $this->model->insertBanner($nombreArchivo, $nuevonombre, $cantidad, $posicion);
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

						if (!file_exists('Assets/archivos/banner/')) {
							mkdir('Assets/archivos/banner/', 0777, true);
							if (file_exists('Assets/archivos/banner/')) {
								if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/banner/' . $nuevonombre)) {
									$insert = $this->model->updateBanner($nombreArchivo, $nuevonombre, $cantidad, $idUsuario, $posicion);
								} else {
									echo "no se pudo guardar ";
								}
							}
						} else {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/banner/' . $nuevonombre)) {
								$insert = $this->model->updateBanner($nombreArchivo, $nuevonombre, $cantidad, $idUsuario, $posicion);
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
				$requestDelete = $this->model->deleteBanner($IdBaner);
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
