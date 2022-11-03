<?php

class baner extends Controllers
{
	public function __construct()
	{
		session_start();
		session_regenerate_id(true);
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(3);
	}
	//pagina Banner
	public function baner()
	{

		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Banner";
		$data['page_title'] = "Banner <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-baner";
		$data['page_functions_js'] = "functions_baner.js";
		$this->views->getView($this, "baner", $data);
	}
	//listado de los baner
	public function getList()
	{
		if ($_SESSION['permisos'][3]['r']) {
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
						$btnEdit = '<button class="btn btn-primary  btn-sm " onClick="fntEditbaner(' . $arrData[$i]['IdBaner'] . ')" title="Editar Banner"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
						$btnDelete = '<button class="btn btn-danger btn-sm " onClick="fntDeletebaner(' . $arrData[$i]['IdBaner'] . ')" title="Eliminar Banner"><i class="far fa-trash-alt"></i></button>';
					} else {
						$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
					}
				}
				$arrData[$i]['NombreArchivo'] = '<a target="_blank" href="' . media() . '/upload/portada/' . $arrData[$i]['NombreArchivo'] . '"><span class="badge badge-primary"  > Ver Imagen <i class="fas fa-image"></i></span></a> ';

				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//obtener un baner para actualizar
	public function getOnebaner($idpersona)
	{
		if ($_SESSION['permisos'][3]['u']) {
			$idusuario = intval($idpersona);
			if ($idusuario > 0) {
				$arrData = $this->model->getOneBaner($idusuario);
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

	//insertar y actualizar los Galeria
	public function setBaner()
	{
		if ($_POST) {

			$tipo = $_FILES['archivoSubido']['type'];

			if (empty($_POST['txtNombre']) || empty($_POST['txtPosicion'])) {

				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');

			} elseif ($tipo == "image/png" || $tipo == 'image/jpeg') {

				$IdBaner = intval($_POST['idBanner']);
				$txtNombre = trim($_POST['txtNombre']);
				$txtPosicion = trim($_POST['txtPosicion']);

				$ruta = 'Assets/upload/portada/';
				$obj['NombreArchivo'] = null;

				$bandera = true;

				if ($IdBaner == 0) {

					$option = 1;

					$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
					$extension = pathinfo($_FILES['archivoSubido']['name'], PATHINFO_EXTENSION);

					$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;

					while ($bandera) {
						if (!empty($this->model->buscarArchivoBaner($filename))) {
							$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;
						} else {
							$bandera = false;
						}
					}

					if (!file_exists($ruta)) {
						mkdir($ruta, 0777, true);
						if (file_exists($ruta)) {
							if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
								$insert = $this->model->register($txtNombre, $txtPosicion, $filename);
							} else {
								echo "no se pudo guardar ";
							}
						}
					} else {
						if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
							$insert = $this->model->register($txtNombre, $txtPosicion, $filename);
						} else {
							echo "no se pudo guardar en la carpeta existente";
						}
					}
				} else {

					$option = 2;

					//Actualizar sin Imagen
					if (empty($_FILES['archivoSubido']['name'])) {
						$insert = $this->model->updateBaner($txtNombre, $txtPosicion, $IdBaner);
					} else {
						//Actualizar con Imagen				
						$obj = $this->model->getOneBaner($IdBaner);

						$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
						$extension = pathinfo($_FILES['archivoSubido']['name'], PATHINFO_EXTENSION);
						$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;

						while ($bandera) {
							if (!empty($this->model->buscarArchivoBaner($filename))) {
								$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;
							} else {
								$bandera = false;
							}
						}

						if (!file_exists($ruta)) {
							mkdir($ruta, 0777, true);
							if (file_exists($ruta)) {
								if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
									$insert = $this->model->updateGaleriaBaner($txtNombre, $txtPosicion, $IdBaner, $filename);
								} else {
									echo "no se pudo guardar ";
								}
							}
						} else {
							if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
								$insert = $this->model->updateGaleriaBaner($txtNombre, $txtPosicion, $IdBaner, $filename);
							} else {
								echo "no se pudo guardar";
							}
						}
					}
				}

				if ($insert > 0) {
					if ($option == 1) {
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					}
					if ($option == 2) {
						removeFile($ruta, $obj['NombreArchivo']);
						$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
					}
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			} else {
				$arrResponse = array("status" => false, "msg" => 'Solo se permiten archivos 
				.jpg, .png.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//borrar un delete Galeria
	public function deletebaner($IdBaner)
	{

		if ($_SESSION['permisos'][3]['d']) {
			$IdBaner = intval($IdBaner);

			$archivo = $this->model->getOneBaner($IdBaner);

			$ruta = 'Assets/upload/portada/';
			removeFile($ruta, $archivo['NombreArchivo']);

			$requestDelete = $this->model->removeBaner($IdBaner);

			if ($requestDelete) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la Imagen');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la Imagen');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}

		die();
	}
}
