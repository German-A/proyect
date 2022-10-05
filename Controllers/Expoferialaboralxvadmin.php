<?php

class expoferialaboralxvadmin extends Controllers
{
	public function __construct()
	{
		session_start();
		//session_regenerate_id(true);
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(29);
	}
	//pagina Banner
	public function Expoferialaboralxvadmin()
	{

		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Expoferialaboralxv Admin";
		$data['page_title'] = "Expoferialaboralxv <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-Expoferia Laboral xv";
		$data['page_functions_js'] = "functions_banner.js";
		$this->views->getView($this, "Expoferialaboralxvadmin", $data);
	}

	//pagina Banner
	public function galeria()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Expoferialaboralxv Galeria";
		$data['page_title'] = "Expoferialaboralxv Galeria";
		$data['page_name'] = "USE - Expoferia Laboral xv";

		$this->views->getView($this, "galeria", $data);
	}

	//listado de los Galeria
	public function getGaleria()
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->listaGaleria();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm fntView" onClick="fntView(' . $arrData[$i]['idexpoxvgaleria'] . ')" title="Ver Galería"><i class="far fa-eye"></i></button>';
				}


				if ($_SESSION['permisosMod']['u']) {
					$btnEdit = '<button class="btn btn-primary  btn-sm " onClick="fntEditGaleria(' . $arrData[$i]['idexpoxvgaleria'] . ')" title="Editar Galería"><i class="fas fa-pencil-alt"></i></button>';
				} else {
					$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
				}


				if ($_SESSION['permisosMod']['d']) {

					$btnDelete = '<button class="btn btn-danger btn-sm " onClick="fntDeleteGaleria(' . $arrData[$i]['idexpoxvgaleria'] . ')" title="Eliminar Galería"><i class="far fa-trash-alt"></i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}

				if ($arrData[$i]['status'] == 1) {
					$arrData[$i]['status'] = '<span class="badge badge-success">Habilitado</span>';
				} else {
					$arrData[$i]['status'] = '<span class="badge badge-danger">Eliminado</span>';
				}


				$arrData[$i]['archivo'] = '<a href="' . base_url() . '/Assets/archivos/exporiaxv/' . $arrData[$i]['archivo'] . '"target="_blank"><span class="badge badge-primary"  > Ver Imagen <i class="fas fa-image"></i></span></a> ';

				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}


	//insertar y actualizar los Banners
	public function setgaleria()
	{
		if ($_POST) {
			if (empty($_POST['txtNombre'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en la Galería.');
			} else {

				$idexpoxvgaleria = intval($_POST['idexpoxvgaleria']);

				$txtNombre = trim($_POST['txtNombre']);
				$txtPosicion = trim($_POST['txtPosicion']);
				$request_user = "";

				if ($idexpoxvgaleria == 0) {

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

					if (!file_exists('Assets/archivos/exporiaxv/')) {
						mkdir('Assets/archivos/exporiaxv/', 0777, true);
						if (file_exists('Assets/archivos/exporiaxv/')) {

							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/exporiaxv/' . $nuevonombre)) {
								$insert = $this->model->registerGaleria($txtNombre, $txtPosicion, $nuevonombre);
							} else {
								echo "no se pudo guardar ";
							}
						}
					} else {

						if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/exporiaxv/' . $nuevonombre)) {
							$insert = $this->model->registerGaleria($txtNombre, $txtPosicion, $nuevonombre);
						} else {
							echo "no se pudo guardar";
						}
					}
				} else {
					$option = 2;

					$cantidadBanner = "";
					$cantidadBanner = $this->model->cantidadBanner();

					//Actualizar sin Imagen

					if (empty($_FILES['archivoSubido']['name'])) {
						$insert = $this->model->toupdate($txtNombre, $txtPosicion, $idexpoxvgaleria);
					} else {
						//Actualizar con Imagen
						$cantidad = $cantidadBanner['cant'];
						$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
						$nombre = $_FILES['archivoSubido']['name'];
						$nuevonombre = $cantidad . $nombre;

						if ($cantidad == null) {
							$cantidad = 0;
						} else {
							$cantidad++;
						}

						if (!file_exists('Assets/archivos/exporiaxv/')) {
							mkdir('Assets/archivos/exporiaxv/', 0777, true);
							if (file_exists('Assets/archivos/exporiaxv/')) {
								if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/exporiaxv/' . $nuevonombre)) {
									$insert = $this->model->updateGaleria($txtNombre, $txtPosicion, $nuevonombre, $idexpoxvgaleria);
								} else {
									echo "no se pudo guardar ";
								}
							}
						} else {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/exporiaxv/' . $nuevonombre)) {
								$insert = $this->model->updateGaleria($txtNombre, $txtPosicion, $nuevonombre, $idexpoxvgaleria);
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
	public function getOneGaleria($idexpoxvgaleria)
	{
		if ($_SESSION['permisosMod']['r']) {
			$idexpoxvgaleria = intval($idexpoxvgaleria);
			if ($idexpoxvgaleria > 0) {
				$arrData = $this->model->getOneGaleria($idexpoxvgaleria);
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
	public function deleteGaleria($idexpoxvgaleria)
	{

		if ($_SESSION['permisosMod']['d']) {
			$idexpoxvgaleria = intval($idexpoxvgaleria);
			$NombreArchivo = $this->model->getOneGaleria($idexpoxvgaleria);
			//borrar documentos
			$requestDelete = $this->model->removeImagen($idexpoxvgaleria);
			@unlink('Assets/archivos/exporiaxv/' . $NombreArchivo['archivo']);
			if ($requestDelete) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la Imagen');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la Imagen');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}

		die();
	}


	//insertar y actualizar los Banners
	public function set()
	{
		if ($_POST) {
			if (empty($_POST['txtNombre'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en la Expoferia Laboralxv.');
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

					if (!file_exists('Assets/archivos/banner/')) {
						mkdir('Assets/archivos/banner/', 0777, true);
						if (file_exists('Assets/archivos/banner/')) {

							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/banner/' . $nuevonombre)) {
								$insert = $this->model->register($nombreArchivo, $nuevonombre, $cantidad, $posicion);
							} else {
								echo "no se pudo guardar ";
							}
						}
					} else {

						if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/banner/' . $nuevonombre)) {
							$insert = $this->model->register($nombreArchivo, $nuevonombre, $cantidad, $posicion);
						} else {
							echo "no se pudo guardar";
						}
					}
				} else {
					$option = 2;

					$cantidadBanner = "";
					$cantidadBanner = $this->model->cantidadBanner();

					//Actualizar sin Imagen

					if ($_FILES['archivoSubido']['name'] == "") {
						$insert = $this->model->updatePosicion($nombreArchivo, $idUsuario, $posicion);
					} else {
						//Actualizar con Imagen
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
									$insert = $this->model->toupdate($nombreArchivo, $nuevonombre, $cantidad, $idUsuario, $posicion);
								} else {
									echo "no se pudo guardar ";
								}
							}
						} else {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/banner/' . $nuevonombre)) {
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
}
