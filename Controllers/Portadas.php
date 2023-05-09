<?php

class portadas extends Controllers
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
	public function portadas()
	{

		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Banner";
		$data['page_title'] = "Banner <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-portadas";
		$data['page_functions_js'] = "functions_portadas.js";
		$this->views->getView($this, "portadas", $data);
	}
	//listado de los portadas
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

						$btnEdit = '<button class="btn btn-primary  btn-sm " onClick="fntEdit(' . $arrData[$i]['IdBaner'] . ')" title="Editar Banner"><i class="fas fa-pencil-alt"></i></button>';
					
				}
				if ($_SESSION['permisosMod']['d']) {
		
						$btnDelete = '<button class="btn btn-danger btn-sm " onClick="fntDelete(' . $arrData[$i]['IdBaner'] . ')" title="Eliminar Banner"><i class="far fa-trash-alt"></i></button>';
					
				}
				$arrData[$i]['NombreArchivo'] = '<a target="_blank" href="' . media() . '/upload/portadas/' . $arrData[$i]['NombreArchivo'] . '"><span class="badge badge-primary"  > Ver Imagen <i class="fas fa-image"></i></span></a> ';

				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//obtener un portadas para actualizar
	public function getOne($id)
	{
		if ($_SESSION['permisos'][3]['u']) {
			$id = intval($id);
			if ($id > 0) {
				$arrData = $this->model->getOne($id);
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
	public function set()
	{
		if ($_POST) {

			if (empty($_POST['txtNombre']) || empty($_POST['txtPosicion'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			} else {

				$IdBaner = intval($_POST['idBanner']);
				$txtNombre = trim($_POST['txtNombre']);
				$txtPosicion = trim($_POST['txtPosicion']);

				$ruta = 'Assets/upload/portadas/';
				$obj['NombreArchivo'] = null;

				$bandera = true;
				$insert =null;

				if ($IdBaner == 0) {

					$tipo = $_FILES['archivoSubido']['type'];

					if ($tipo == "image/png" || $tipo == 'image/jpeg') {

						$option = 1;

						$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
						$extension = pathinfo($_FILES['archivoSubido']['name'], PATHINFO_EXTENSION);

						$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;

						while ($bandera) {
							if (!empty($this->model->buscarArchivo($filename))) {
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

						$arrResponse = array("status" => false, "msg" => 'Solo se permiten archivos .jpg, .png.');
					}
				} else {

					$option = 2;

					//Actualizar sin Imagen
					if (empty($_FILES['archivoSubido']['name'])) {
						$insert = $this->model->actualizar($txtNombre, $txtPosicion, $IdBaner);
					} else {
						$tipo = $_FILES['archivoSubido']['type'];

						if ($tipo == "image/png" || $tipo == 'image/jpeg') {

							//Actualizar con Imagen				
							$obj = $this->model->getOne($IdBaner);

							$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
							$extension = pathinfo($_FILES['archivoSubido']['name'], PATHINFO_EXTENSION);
							$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;

							while ($bandera) {
								if (!empty($this->model->buscarArchivo($filename))) {
									$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;
								} else {
									$bandera = false;
								}
							}

							if (!file_exists($ruta)) {
								mkdir($ruta, 0777, true);
								if (file_exists($ruta)) {
									if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
										$insert = $this->model->actualizarArchivo($txtNombre, $txtPosicion, $IdBaner, $filename);
									} else {
										echo "no se pudo guardar ";
									}
								}
							} else {
								if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
									$insert = $this->model->actualizarArchivo($txtNombre, $txtPosicion, $IdBaner, $filename);
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
					}
					if ($option == 2) {
						removeFile($ruta, $obj['NombreArchivo']);
						$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
					}
				} 
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//borrar un delete Galeria
	public function delete($IdBaner)
	{

		if ($_SESSION['permisos'][3]['d']) {
			$IdBaner = intval($IdBaner);

			$archivo = $this->model->getOne($IdBaner);

			$ruta = 'Assets/upload/portadas/';
			removeFile($ruta, $archivo['NombreArchivo']);

			$requestDelete = $this->model->borrar($IdBaner);

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
