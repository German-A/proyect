<?php

class repositorio extends Controllers
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

	#region repositorio_datos
	public function repositorio()
	{

		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Repositorio";
		$data['page_title'] = "Repositorio el orden esta de manera descendente";
		$data['page_name'] = "USE-repositorio";
		$data['page_functions_js'] = "functions_repositorio.js";
		$this->views->getView($this, "repositorio", $data);
	}

	public function getList()
	{
		if ($_SESSION['permisos'][32]['r']) {
			$arrData = $this->model->getList();
			for ($i = 0; $i < count($arrData); $i++) {

				$btnEdit = '';
				$btnDelete = '';
				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm fntView" onClick="fntView(' . $arrData[$i]['idrepositorio'] . ')" title="Ver Repositorio"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					$btnEdit = '<button class="btn btn-primary  btn-sm " onClick="fntEdit(' . $arrData[$i]['idrepositorio'] . ')" title="Editar Repositorio"><i class="fas fa-pencil-alt"></i></button>';
				} else {
					$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
				}

				if ($_SESSION['permisosMod']['d']) {
					$btnDelete = '<button class="btn btn-danger btn-sm " onClick="fntDelete(' . $arrData[$i]['idrepositorio'] . ')" title="Eliminar Repositorio"><i class="far fa-trash-alt"></i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}

				$arrData[$i]['filename'] = '<a target="_blank" href="' . media() . '/upload/repositorio/' . $arrData[$i]['filename'] . '"><span class="badge badge-primary"  > Ver Imagen <i class="fas fa-image"></i></span></a> ';

				$arrData[$i]['options'] = '<div class="text-center"> ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	#endregion repositorio_datos

	#region insertar_actualizar
	public function getOne($id)
	{
		if ($_SESSION['permisos'][32]['u']) {
			$idrepositorio = intval($id);
			if ($idrepositorio > 0) {
				$arrData = $this->model->getOne($idrepositorio);
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

				$idrepositorio = intval(strClean($_POST['idrepositorio']));
				$nombre = strClean($_POST['txtNombre']);
				$posicion = intval(strClean($_POST['txtPosicion']));

				$created_by = $_SESSION['idUser'];
				$created_at =  strtotime(date("Y-m-d H:i:s"));

				$updated_by = $_SESSION['idUser'];
				$updated_at =  strtotime(date("Y-m-d H:i:s"));



				/*con archivo*/
				$Folder = 'Assets/upload/repositorio/';
				$deleteFolder = 'Assets/upload/repositorio/delete/';
				$filename = '';
				$findFile = true;
				$notFile = false;

				$archivos = array(
					"archivo1" => "application/pdf"
				);

				$insert = "";

				/*registro*/
				if ($idrepositorio == null) {
					$option = 1;

					$filename = $this->upload($archivos, $findFile, $Folder);
					/*registro*/
					if ($_SESSION['permisosMod']['w']) {
						$insert = $this->model->newRegister($nombre, $filename, $posicion, $created_by, $created_at);
					}
				}

				/*actualizacion*/
				if ($idrepositorio != null) {

					$option = 2;

					if (!empty(isset($_FILES['archivoSubido']['type']))) {
						$filename = $this->upload($archivos, $findFile, $Folder);
					} else {
						$notFile = true;
					}

					if ($notFile) {
						if ($_SESSION['permisosMod']['u']) {
							$insert = $this->model->newUpdate($idrepositorio, $nombre, $posicion, $updated_by, $updated_at);
							$filename = $this->model->findFileId($idrepositorio);
							$arrData = array(
								"filename" => $filename['filename']
							);
						}
					} else {
						if ($_SESSION['permisosMod']['u']) {
							$file_old = $this->model->findFileId($idrepositorio);
							$file_old = $file_old['filename'];
							$Folder_archivo = $Folder .  $file_old;

							if (!file_exists($deleteFolder)) {
								mkdir($deleteFolder, 0777, true);
								rename($Folder_archivo, $deleteFolder . $file_old);
							} else {
								rename($Folder_archivo, $deleteFolder . $file_old);
							}

							$insert = $this->model->newUpdateFile($idrepositorio, $nombre, $posicion, $filename, $updated_by, $updated_at);

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

				$idrepositorio = intval(strClean($_POST['id']));

				$Folder = 'Assets/upload/repositorio/';
				$deleteFolder = 'Assets/upload/repositorio/delete/';

				$file_old = $this->model->findFileId($idrepositorio);
				$file_old = $file_old['filename'];

				$Folder_archivo = $Folder . $file_old;

				if (!file_exists($deleteFolder)) {
					mkdir($deleteFolder, 0777, true);
					rename($Folder_archivo, $deleteFolder . $file_old);
				} else {
					rename($Folder_archivo, $deleteFolder . $file_old);
				}

				$requestDelete = $this->model->delete_registro($idrepositorio);

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
