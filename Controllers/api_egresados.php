<?php

class api_egresados extends Controllers
{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(32);
	}

	#region api_egresados_datos
	public function api_egresados()
	{

		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "api_egresados";
		$data['page_title'] = "api_egresados el orden esta de manera descendente";
		$data['page_name'] = "USE-api_egresados";
		$data['page_functions_js'] = "functions_api_egresados.js";



		$this->views->getView($this, "api_egresados", $data);
	}

	public function getList()
	{
		$url = "https://api-tramites.unitru.edu.pe/api/egresados/2023/8";
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$arrData = curl_exec($curl);
		curl_close($curl);
		echo $arrData;
		die();
	}
	#endregion api_egresados_datos

	#region insertar_actualizar
	public function getOne($id)
	{
		if ($_SESSION['permisos'][32]['u']) {
			$idapi_egresados = intval($id);
			if ($idapi_egresados > 0) {
				$arrData = $this->model->getOne($idapi_egresados);
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

	public function upload($archivos, $findFile, $Folder)
	{
		/*SI EXISTE ARCHIVO*/
		#region ARCHIVO
		if (isset($_FILES['archivoSubido']['type'])) {
			$tipo = $_FILES['archivoSubido']['type']; /*FORMATO DE ARCHIVO*/
			if ($tipo != '') {
				if (in_array($tipo, $archivos)) {
					/*nombre del archivo y ubicacion temporal*/
					$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
					$extension = pathinfo($_FILES['archivoSubido']['name'], PATHINFO_EXTENSION);

					$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;

					/*buscar si ya existe el nombre del archivo*/
					while ($findFile) {
						if (!empty($this->model->findFile($filename))) {
							$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;
						} else {
							$findFile = false;
						}
					}

					/*buscar si ya existe el nombre del archivo*/
					if (!file_exists($Folder)) {
						mkdir($Folder, 0777, true);
						if (file_exists($Folder)) {
							if (move_uploaded_file($ubicacionTemporal, $Folder . $filename)) {
								return $filename;
								die();
							} else {
								$arrResponse = array("status" => false, "archivo" => false, "msg" => 'no se pudo guardar, en la carpeta existente');
								echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
								die();
							}
						}
					} else {
						if (move_uploaded_file($ubicacionTemporal, $Folder . $filename)) {
							return $filename;
							die();
						} else {
							$arrResponse = array("status" => false, "archivo" => false, "msg" => 'no se pudo guardar, en la carpeta ');
							echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
							die();
						}
					}
				} else {
					$arrResponse = array("status" => false, "archivo" => false, "msg" => 'Solo se puede enviar imagenes.');
					echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
					die();
				}
			}
		}
		#endregion ARCHIVO
	}

	public function set()
	{
		if ($_POST) {
			if (empty($_POST['txtNombre'])) {
				$arrResponse = array("status" => false, "msg" => 'Faltan Datos.');
			} else {

				$idapi_egresados = intval(strClean($_POST['idapi_egresados']));
				$nombre = strClean($_POST['txtNombre']);
				$posicion = intval(strClean($_POST['txtPosicion']));

				$created_by = $_SESSION['idUser'];
				$created_at =  strtotime(date("Y-m-d H:i:s"));

				$updated_by = $_SESSION['idUser'];
				$updated_at =  strtotime(date("Y-m-d H:i:s"));



				/*con archivo*/
				$Folder = 'Assets/upload/api_egresados/';
				$deleteFolder = 'Assets/upload/api_egresados/delete/';
				$filename = '';
				$findFile = true;
				$notFile = false;

				$archivos = array(
					"archivo1" => "application/pdf"
				);

				$insert = "";

				/*registro*/
				if ($idapi_egresados == null) {
					$option = 1;

					$filename = $this->upload($archivos, $findFile, $Folder);
					/*registro*/
					if ($_SESSION['permisosMod']['w']) {
						$insert = $this->model->newRegister($nombre, $filename, $posicion, $created_by, $created_at);
					}
				}

				/*actualizacion*/
				if ($idapi_egresados != null) {

					$option = 2;

					if (!empty(isset($_FILES['archivoSubido']['type']))) {
						$filename = $this->upload($archivos, $findFile, $Folder);
					} else {
						$notFile = true;
					}

					if ($notFile) {
						if ($_SESSION['permisosMod']['u']) {
							$insert = $this->model->newUpdate($idapi_egresados, $nombre, $posicion, $updated_by, $updated_at);
							$filename = $this->model->findFileId($idapi_egresados);
							$arrData = array(
								"filename" => $filename['filename']
							);
						}
					} else {
						if ($_SESSION['permisosMod']['u']) {
							$file_old = $this->model->findFileId($idapi_egresados);
							$file_old = $file_old['filename'];
							$Folder_archivo = $Folder .  $file_old;

							if (!file_exists($deleteFolder)) {
								mkdir($deleteFolder, 0777, true);
								rename($Folder_archivo, $deleteFolder . $file_old);
							} else {
								rename($Folder_archivo, $deleteFolder . $file_old);
							}

							$insert = $this->model->newUpdateFile($idapi_egresados, $nombre, $posicion, $filename, $updated_by, $updated_at);

							$arrData = array(
								"filename" => $filename,
							);
						}
					}
				}

				if ($insert > 0) {
					if ($option == 1) {
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					}
					if ($option == 2) {
						$arrResponse = array('status' => true, 'data' => $arrData, 'msg' => 'Datos actualizados correctamente.');
					}
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	#endregion insertar_actualizar


	#region borrar	
	public function delete()
	{

		if ($_POST) {
			if ($_SESSION['permisos'][32]['d']) {

				$idapi_egresados = intval(strClean($_POST['id']));

				$Folder = 'Assets/upload/api_egresados/';
				$deleteFolder = 'Assets/upload/api_egresados/delete/';

				$file_old = $this->model->findFileId($idapi_egresados);
				$file_old = $file_old['filename'];

				$Folder_archivo = $Folder . $file_old;

				if (!file_exists($deleteFolder)) {
					mkdir($deleteFolder, 0777, true);
					rename($Folder_archivo, $deleteFolder . $file_old);
				} else {
					rename($Folder_archivo, $deleteFolder . $file_old);
				}

				$requestDelete = $this->model->delete_registro($idapi_egresados);

				if ($requestDelete) {
					$arrData = array('status' => true, 'msg' => 'Se ha eliminado correctamente');
				} else {
					$arrData = array('status' => false, 'msg' => 'Error al eliminar.');
				}
				echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}
	#endregion borrar
}
