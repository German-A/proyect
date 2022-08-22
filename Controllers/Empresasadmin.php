<?php

class empresasadmin extends Controllers
{
	public function __construct()
	{
		session_start();
		//session_regenerate_id(true);
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(9);
	}
	//pagina empresa
	public function empresasadmin()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Empresas";
		$data['page_title'] = "Empresas <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-Empresasr";
		$data['page_functions_js'] = "functions_empresaadmin.js";
		$this->views->getView($this, "empresasadmin", $data);
	}
	//listado de los empresas
	public function getEmpresas()
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->listadoEmpresas();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				$btnVie = '';
				$btnConfe = '';
				//echo base_url();
				//Registrar Empleo
				if ($_SESSION['permisos'][11]['r']) {
					$btnVie = '<a class="btn btn-success btn-sm " href="' . base_url() . '/empresaempleoadmin/empresaempleoadmin/' . $arrData[$i]['idempresa'] . '"  title="Ver Empleos"><i class="far fa-eye"></i>Empleo</a>';
				}

				//Registrar Conferencia
				if ($_SESSION['permisos'][10]['r']) {
					$btnConfe = '<a class="btn btn-warning btn-sm" href="' . base_url() . '/conferenciaempresaadmin/conferenciaempresaadmin/' . $arrData[$i]['idempresa'] . '" title="Ver Conferencia "><i class="far fa-eye"></i>Conferencia</a>';
				}

				//visualizar
				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm fntView" onClick="fntView(' . $arrData[$i]['idpersona'] . ')" title="Ver Empresa"><i class="far fa-eye"></i></button>';
				}
				//editar
				if ($_SESSION['permisosMod']['u']) {
					$btnEdit = '<button class="btn btn-primary  btn-sm fntEdit" onClick="fntEdit(this,' . $arrData[$i]['idpersona'] . ')" title="Editar Empresa"><i class="fas fa-pencil-alt"></i></button>';
				} else {
					$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
				}

				//eliminar
				if ($_SESSION['permisosMod']['d']) {
					$btnDelete = '<button class="btn btn-danger btn-sm fntDelete" onClick="fntDelete(' . $arrData[$i]['idpersona'] . ')" title="Eliminar empresa"><i class="far fa-trash-alt"></i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}

				$Habilitado = 'Habilitado';
				$Desabilitado = 'Desabilitado';

				if ($arrData[$i]['status'] = 1) {
					$arrData[$i]['status'] = '<a ><span class="badge badge-success"  >' . $Habilitado . '</span></a> ';
				} elseif ($arrData[$i]['status'] = 2) {
					$arrData[$i]['status'] = '<a ><span class="badge badge-primary"  >' . $Desabilitado . '</span></a> ';
				}

				$imagen = 'ver imagen';
				$arrData[$i]['imagen'] = '<a href="' . base_url() . '/Assets/archivos/empresa/' . $arrData[$i]['imagen'] . '"target="_blank"><span class="badge badge-primary"  >' . $imagen . '</span></a> ';

				$arrData[$i]['options'] = '<div class="text-center">' . $btnConfe . ' ' . $btnVie . ' ' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//insertar y actualizar los empresas
	public function set()
	{
		if ($_POST) {
			if (empty($_POST['dni'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en la Empresa.');
			} else {
				$idUsuario = intval($_POST['id']);
				$nombres = $_POST['nombres'];
				$apellidop = $_POST['apellidop'];
				$apellidom = $_POST['apellidom'];
				$email_user = $_POST['email_user'];
				$dni = $_POST['dni'];
				$telefono = $_POST['telefono'];
				$nombreEmpresa = $_POST['nombreEmpresa'];
				$ruc = $_POST['ruc'];
				$Direccion = $_POST['Direccion'];
				$password = $dni;

				$request_user = "";
				if ($idUsuario == 0) {

					$option = 1;

					$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
					$nombre = $_FILES['archivoSubido']['name'];

					$imagen = $ruc . $nombre;


					if (!file_exists('Assets/archivos/empresa/')) {
						mkdir('Assets/archivos/empresa/', 0777, true);
						if (file_exists('Assets/archivos/empresa/')) {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/empresa/' . $imagen)) {
								$personaid = $this->model->register($nombres, $apellidop, $apellidom, $email_user, $dni, $telefono, $password, $imagen);
								$insert = $this->model->registerEmpresa($nombreEmpresa, $ruc, $Direccion, $personaid);
							} else {
								echo "no se pudo guardar ";
							}
						}
					} else {
						if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/empresa/' . $imagen)) {
							$personaid = $this->model->register($nombres, $apellidop, $apellidom, $email_user, $dni, $telefono, $password, $imagen);
							$insert = $this->model->registerEmpresa($nombreEmpresa, $ruc, $Direccion, $personaid);
						} else {
							echo "no se pudo guardar";
						}
					}
				} else {
					$option = 2;


					//$nombre = null;
					//Actualizar sin Imagen
					if ($_FILES['archivoSubido']['name'] == "") {
						$personaid = $this->model->toupdate($nombres, $apellidop, $apellidom, $email_user, $dni, $telefono, $idUsuario);
						$insert = $this->model->toupdateEmpresa($nombreEmpresa, $ruc, $Direccion, $idUsuario);
					} else {

						//Actualizar con Imagen
						$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
						$nombre = $_FILES['archivoSubido']['name'];
						$imagen = $ruc . $nombre;


						$imagen = 'ss';

						if (!file_exists('Assets/archivos/empresa/')) {
							mkdir('Assets/archivos/empresa/', 0777, true);
							if (file_exists('Assets/archivos/empresa/')) {
								if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/empresa/' . $imagen)) {
									$personaid = $this->model->toupdateimg($nombres, $apellidop, $apellidom, $email_user, $dni, $telefono, $idUsuario, $imagen);
									$insert = $this->model->toupdateEmpresa($nombreEmpresa, $ruc, $Direccion, $idUsuario);
								} else {
									echo "no se pudo guardar ";
								}
							}
						} else {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/empresa/' . $imagen)) {
								$personaid = $this->model->toupdateimg($nombres, $apellidop, $apellidom, $email_user, $dni, $telefono, $idUsuario, $imagen);
								$insert = $this->model->toupdateEmpresa($nombreEmpresa, $ruc, $Direccion, $idUsuario);
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

	//borrar un empresa
	public function delete()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$IdBaner = intval($_POST['IdBaner']);
				$NombreArchivo = $this->model->getOne($IdBaner);
				//borrar documentos
				$requestDelete = $this->model->remove($IdBaner);
				@unlink('Assets/archivos/empresa/' . $NombreArchivo['imagen']);
				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la Empresa');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la Empresa.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}
}
