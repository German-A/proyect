<?php


class usuarios extends Controllers
{
	public function __construct()
	{
		session_start();
		parent::__construct();

		//session_regenerate_id(true);
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(2);
	}

	public function usuarios()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Usuarios";
		$data['page_title'] = "USUARIOS <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "usuarios";
		$data['page_functions_js'] = "functions_usuarios.js";
		$this->views->getView($this, "usuarios", $data);
	}

	public function setUsuario()
	{
		if ($_POST) {
			if (empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) || empty($_POST['listRolid']) || empty($_POST['listStatus'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			} else {
				$idUsuario = intval($_POST['idUsuario']);

				$strNombre = ucwords(strClean($_POST['txtNombre']));
				$strApellido = ucwords(strClean($_POST['txtApellido']));
				$strTelefono = strClean($_POST['txtTelefono']);
				$strEmail = strtolower(strClean($_POST['txtEmail']));
				$intTipoId = intval(strClean($_POST['listRolid']));
				$intStatus = intval(strClean($_POST['listStatus']));
				$request_user = "";
				if ($idUsuario == 0) {
					$option = 1;
					//$strPassword =  empty($_POST['txtPassword']) ? hash("SHA256",passGenerator()) : hash("SHA256",$_POST['txtPassword']);
					$strPassword =  strClean($_POST['txtPassword']);
					if ($_SESSION['permisosMod']['w']) {
						$request_user = $this->model->insertUsuario(
							$strNombre,
							$strApellido,
							$strTelefono,
							$strEmail,
							$strPassword,
							$intTipoId,
							$intStatus
						);

						if ($request_user > 0) {

							$arrData = $this->model->obtenerRol($request_user);


							if ($arrData['idrol'] == 4) {

								$txtEmpresa = ucwords(strClean($_POST['txtEmpresa']));
								$txtDireccion = ucwords(strClean($_POST['txtDireccion']));
								$txtRuc = ucwords(strClean($_POST['txtRuc']));

								$this->model->insertUsuarioEmpresa(
									$txtEmpresa,
									$txtDireccion,
									$txtRuc,
									$request_user
								);
							}
						}
					}
				} else {
					$option = 2;
					//$strPassword =  empty($_POST['txtPassword']) ? "" : hash("SHA256",$_POST['txtPassword']);
					$strPassword =  strClean($_POST['txtPassword']);
					if ($_SESSION['permisosMod']['u']) {
						$request_user = $this->model->updateUsuario(
							$idUsuario,

							$strNombre,
							$strApellido,
							$strTelefono,
							$strEmail,
							$strPassword,
							$intTipoId,
							$intStatus
						);
					}
				}



				if ($request_user > 0) {
					if ($option == 1) {
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					} else {
						$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
					}
				} else if ($request_user == 'exist') {
					$arrResponse = array('status' => false, 'msg' => '¡Atención! el email ya existe, ingrese otro.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}



	public function getUsu()
	{
		$arrData = $this->model->obte();
		echo  $arrData;
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}





	public function getusuarios()
	{

		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->selectUsuarios();


			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				if ($arrData[$i]['status'] == 1) {
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				} else {
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewUsuario(' . $arrData[$i]['idpersona'] . ')" title="Ver usuario"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					if (($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
						($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1)
					) {
						$btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditUsuario(this,' . $arrData[$i]['idpersona'] . ')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
						($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1) and
						($_SESSION['userData']['idpersona'] != $arrData[$i]['idpersona'])
					) {
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario(' . $arrData[$i]['idpersona'] . ')" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button>';
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

	public function getUsuario($idpersona)
	{
		if ($_SESSION['permisosMod']['r']) {
			$idusuario = intval($idpersona);
			if ($idusuario > 0) {
				$arrData = $this->model->selectUsuario($idusuario);
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

	public function delUsuario()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$intIdpersona = intval($_POST['idUsuario']);
				$requestDelete = $this->model->deleteUsuario($intIdpersona);
				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	public function perfil()
	{
		$data['page_tag'] = "Perfil";
		$data['page_title'] = "Perfil de usuario";
		$data['page_name'] = "perfil";
		$data['page_functions_js'] = "functions_usuarios.js";
		$this->views->getView($this, "perfil", $data);
	}



	public function putDFical()
	{
		if ($_POST) {
			if (empty($_POST['txtNombreFiscal']) || empty($_POST['txtDirFiscal'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			} else {
				$idUsuario = $_SESSION['idUser'];

				$strNomFiscal = strClean($_POST['txtNombreFiscal']);
				$strDirFiscal = strClean($_POST['txtDirFiscal']);
				$request_datafiscal = $this->model->updateDataFiscal(
					$idUsuario,

					$strNomFiscal,
					$strDirFiscal
				);
				if ($request_datafiscal) {
					sessionUser($_SESSION['idUser']);
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function perfilUsuario()
	{
		$data['page_tag'] = "Perfil";
		$data['page_title'] = "Perfil de usuario";
		$data['page_name'] = "perfil";
		$data['page_functions_js'] = "functions_usuarios.js";
		$this->views->getView($this, "perfilUsuario", $data);
	}

	public function getEgresado($idpersona)
	{
		
			$idusuario = intval($idpersona);
			if ($idusuario > 0) {
				$arrData = $this->model->selectUsuario($idusuario);
				if (empty($arrData)) {
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				} else {
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		
		die();
	}

	public function putPerfilEgresado()
	{
		if ($_POST) {
			if (empty($_POST['txtNombre']) || empty($_POST['txtApellidop']) || empty($_POST['txtApellidom'])) {
				$arrResponse = array("status" => false, "msg" => 'Los campos con (*) no pueden estar vacios.');
			} else {
				$idUsuario = strClean($_POST['idUsuario']);
				$strNombre = strClean($_POST['txtNombre']);
				$strApellidop = strClean($_POST['txtApellidop']);
				$strApellidom = strClean($_POST['txtApellidom']);
				$strTelefono = strClean($_POST['txtTelefono']);

				$strPassword = strClean($_POST['txtPassword']);
			
				// if (!empty($_POST['txtPassword'])) {
				// 	$strPassword = hash("SHA256", $_POST['txtPassword']);
				// }
				$request_user = $this->model->updatePerfil(
					$idUsuario,
					$strNombre,
					$strApellidop,
					$strApellidom,
					$strTelefono,
					$strPassword
				);
				if ($request_user) {
					sessionUser($_SESSION['idUser']);
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
				}
		
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	}

	public function putPerfilFotoEgresado()
	{
		if ($_POST) {
		
			if (empty($_POST['idUsuario2'])) {
		
				$arrResponse = array("status" => false, "msg" => 'Los campos con (*) no pueden estar vacios.');
			} else {
		
				$idUsuario = intval($_POST['idUsuario2']);


				$ubicacionTemporal = $_FILES['file']['tmp_name'];
				$nombre = $_FILES['file']['name'];

			

				$nuevonombre =  $nombre;

				if (!file_exists('Assets/archivos/egresados/')) {
					mkdir('Assets/archivos/egresados/', 0777, true);
					if (file_exists('Assets/archivos/egresados/')) {
						if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/egresados/' . $nuevonombre)) {
							$request_user = $this->model->updateFoto($idUsuario,$nuevonombre);
						} else {
							echo "no se pudo guardar";
						}
					}
				} else {
					if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/egresados/' . $nuevonombre)) {
						$request_user = $this->model->updateFoto($idUsuario,$nuevonombre);
					} else {
						echo "no se pudo guardarrr";
					}
				}



				if ($request_user) {
					sessionUser($_SESSION['idUser']);
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
				}
		
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	}
	
}