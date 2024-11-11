<?php

class difusion extends Controllers
{
	private $idempleo;
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
	public function difusion()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "difusion";
		$data['page_title'] = "difusion <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-difusion";

		$data['page_functions_js'] = "functions_difusion.js";
		$this->views->getView($this, "difusion", $data);
	}
	//listado
	public function getDifusion()
	{

		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->getDifusion();


			for ($i = 0; $i < count($arrData); $i++) {

				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				if ($arrData[$i]['status'] == 0) {
					$arrData[$i]['status'] = '<span class="badge badge-danger">Eliminado</span>';
				} else if ($arrData[$i]['status'] == 10) {
					$arrData[$i]['status'] = '<span class="badge badge-warning">Inactivo</span>';
				} else {
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}

				if ($_SESSION['permisos'][18]['r']) {
					$btnView = '<button class="btn btn-info btn-sm" onClick="fntView(' . $arrData[$i]['id_disusion'] . ')" title="Ver encuestas"><i class="far fa-eye"></i></button>';
				}

				if ($_SESSION['permisos'][18]['u']) {
					$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEdit(this,' . $arrData[$i]['id_disusion'] . ')" title="Editar encuesta"><i class="fas fa-pencil-alt"></i></button>';
				} else {
					$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
				}

				if ($_SESSION['permisos'][18]['d']) {
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="ftnDelete(' . $arrData[$i]['id_disusion'] . ')" title="Eliminar encuesta"><i class="far fa-trash-alt"></i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}

				$arrData[$i]['link'] = '<a href="javascript:void(0);" lin-oferta="' . $arrData[$i]['link'] . '"  onClick="copiarLinkOferta(this)" class="btn btn-secondary btn-sm" ><span>web</span></a> ';

				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}






	public function getSelectCarreras()
	{
		$search = "";
		if (!isset($_POST['palabraClave'])) {
			$arrData = $this->model->getSelectCarrera();
		} else {
			$search = $_POST['palabraClave'];

			$arrData = $this->model->getSelectCarreras($search);
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
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


	#region empresas

	public function getSelectEmpresas()
	{
		$search = "";
		if (!isset($_POST['palabraClave'])) {
			$arrData = $this->model->getSelectEmpresa();
		} else {
			$search = $_POST['palabraClave'];

			$arrData = $this->model->getSelectEmpresaW($search);
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function registro_empresa()
	{
		if ($_POST) {
			if (empty($_POST['txtNombreEmpresa'])) {
				$arrResponse = array("status" => false, "msg" => 'Faltan Datos.');
			} else {

				$idrepositorio = intval(strClean($_POST['id']));
				$nombreEmpresa = strClean($_POST['txtNombreEmpresa']);


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

				// $archivos = array(
				// 	"archivo1" => "application/pdf"
				// );

				$archivos = array(
					"archivo1" => "image/png",
					"archivo2" => "image/jpeg",
					"archivo3" => "image/webp",
				);

				$insert = "";

				/*registro*/
				if ($idrepositorio == null) {
					$option = 1;

					$filename = $this->upload($archivos, $findFile, $Folder);
					/*registro*/
					if ($_SESSION['permisosMod']['w']) {
						$insert = $this->model->newRegisterEmpresa($nombreEmpresa, $filename, $created_by, $created_at);
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

	#endregion empresas



	#region registro_difusion_oferta
	public function set()
	{
		if ($_POST) {
			if (empty($_POST['nombre_puesto'])) {
				$arrResponse = array("status" => false, "msg" => 'Faltan Datos.');
			} else {

				$id = intval(strClean($_POST['id']));
				$nombre_puesto = strClean($_POST['nombre_puesto']);
				$modalidad_laboral = strClean($_POST['modalidad_laboral']);
				$condicion_laboral = strClean($_POST['condicion_laboral']);
				$fecha_termino = strClean($_POST['fecha_termino']);
				$link = strClean($_POST['link']);

				$lista_programa_estudio = array();
				$lista_programa_estudio = strClean(json_decode($_POST['lista_programa_estudio']));

					
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

				// $archivos = array(
				// 	"archivo1" => "application/pdf"
				// );

				$archivos = array(
					"archivo1" => "image/png",
					"archivo2" => "image/jpeg",
					"archivo3" => "image/webp",
				);

				$insert = "";

				$id = intval(strClean($_POST['id']));
				$nombre_puesto = strClean($_POST['nombre_puesto']);
				$modalidad_laboral = strClean($_POST['modalidad_laboral']);
				$condicion_laboral = strClean($_POST['condicion_laboral']);
				$fecha_termino = strClean($_POST['fecha_termino']);
				$link = strClean($_POST['link']);



				/*registro*/
				if ($id == null) {
					$option = 1;

					$filename = $this->upload($archivos, $findFile, $Folder);
					/*registro*/
					if ($_SESSION['permisosMod']['w']) {
						$insert = $this->model->newRegisterDifusion($nombre_puesto, $modalidad_laboral,$condicion_laboral, $fecha_termino, $lista_programa_estudio, $link, $created_by, $created_at);
					}
				}

				/*actualizacion*/
				if ($id != null) {

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
	#endregion registro_difusion_oferta

	//obtener un baner para actualizar
	public function getunBanner($idpersona)
	{
		if ($_SESSION['permisosMod']['r']) {
			$id_disusion = intval($idpersona);
			if ($id_disusion > 0) {
				$arrData = $this->model->getunBanner($id_disusion);
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
				$id = intval($_POST['id']);
				$requestDelete = $this->model->deleteBanner($id);
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
