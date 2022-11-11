<?php

class repositorio extends Controllers
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
	//pagina Repositorio
	public function repositorio()
	{

		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Repositorio";
		$data['page_title'] = "Repositorio <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-repositorio";
		$data['page_functions_js'] = "functions_repositorio.js";
		$this->views->getView($this, "repositorio", $data);
	}
	//listado de los repositorio
	public function getList()
	{
		if ($_SESSION['permisos'][3]['r']) {
			$arrData = $this->model->lista();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm fntView" onClick="fntView(' . $arrData[$i]['idrepositorio'] . ')" title="Ver Repositorio"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
						$btnEdit = '<button class="btn btn-primary  btn-sm " onClick="fntEdit(' . $arrData[$i]['idrepositorio'] . ')" title="Editar Repositorio"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
						$btnDelete = '<button class="btn btn-danger btn-sm " onClick="fntDelete(' . $arrData[$i]['idrepositorio'] . ')" title="Eliminar Repositorio"><i class="far fa-trash-alt"></i></button>';
					} else {
						$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
					}
				}
				$arrData[$i]['filename'] = '<a target="_blank" href="' . media() . '/upload/repositorio/' . $arrData[$i]['filename'] . '"><span class="badge badge-primary"  > Ver Imagen <i class="fas fa-image"></i></span></a> ';

				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//obtener un repositorio para actualizar
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

				$idrepositorio = intval($_POST['idrepositorio']);
				$nombre = trim($_POST['txtNombre']);	
				$posicion = trim($_POST['txtPosicion']);

				$ruta = 'Assets/upload/repositorio/';
				$obj['filename'] = null;

				$bandera = true;
				$insert =null;

				if ($idrepositorio == 0) {

					$tipo = $_FILES['archivoSubido']['type'];

	
					if ($tipo == "application/pdf") {

						$option = 1;

						$created_by = $_SESSION['idUser'];	
						$created_at =  strtotime(date("Y-m-d H:i:s"));

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
									$insert = $this->model->register($nombre, $filename, $posicion,$created_by,$created_at);
								} else {
									echo "no se pudo guardar ";
								}
							}
						} else {
							if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
								$insert = $this->model->register($nombre, $filename, $posicion,$created_by,$created_at);
							} else {
								echo "no se pudo guardar en la carpeta existente";
							}
						}
					} else {

						$arrResponse = array("status" => false, "msg" => 'Solo se permiten archivos .pdf');
					}
				} else {

					$option = 2;

					$updated_by =$_SESSION['idUser'];		
					$updated_at =  strtotime(date("Y-m-d H:i:s"));

					//Actualizar sin Imagen
					if (empty($_FILES['archivoSubido']['name'])) {
						$insert = $this->model->actualizar($idrepositorio, $nombre, $posicion, $updated_by, $updated_at);
					} else {
						$tipo = $_FILES['archivoSubido']['type'];

						if ($tipo == "application/pdf") {

							//Actualizar con Imagen				
							$obj = $this->model->getOne($idrepositorio);

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
										$insert = $this->model->actualizarArchivo($idrepositorio, $nombre, $filename, $posicion, $updated_by, $updated_at);
									} else {
										echo "no se pudo guardar ";
									}
								}
							} else {
								if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
									$insert = $this->model->actualizarArchivo($idrepositorio, $nombre, $filename, $posicion, $updated_by, $updated_at);
								} else {
									echo "no se pudo guardar";
								}
							}
						} else {
							$arrResponse = array("status" => false, "msg" => 'Solo se permiten archivos .pdf');
						}
					}
				}

				if ($insert > 0) {
					if ($option == 1) {
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					}
					if ($option == 2) {
						removeFile($ruta, $obj['filename']);
						$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
					}
				} 
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//borrar un delete Galeria
	public function delete($idrepositorio)
	{

		if ($_SESSION['permisos'][3]['d']) {
			$idrepositorio = intval($idrepositorio);

			$archivo = $this->model->getOne($idrepositorio);

			$ruta = 'Assets/upload/repositorio/';
			removeFile($ruta, $archivo['filename']);

			$requestDelete = $this->model->borrar($idrepositorio);

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
