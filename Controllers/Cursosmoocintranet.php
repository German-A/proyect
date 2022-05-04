<?php

class cursosmoocintranet extends Controllers
{
	public function __construct()
	{
		session_start();
		parent::__construct();
		
		//session_regenerate_id(true);
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(3);
	}

	public function cursosmoocintranet()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Cursosmoocintranet";
		$data['page_title'] = "Cursosmoocintranet <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "Cursosmoocintranet";
		$data['page_functions_js'] = "functions_cursosmoocintranet.js";
		$this->views->getView($this, "cursosmoocintranet", $data);
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
					$arrResponse = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getcursosmoocintranet()
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->selectcursosmooc();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';


				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewUsuario(' . $arrData[$i]['IdCursos'] . ')" title="Ver usuario"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					if (($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
						($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1)
					) {
						$btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditUsuario(this,' . $arrData[$i]['IdCursos'] . ')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
						($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1)
					) {
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario(' . $arrData[$i]['IdCursos'] . ')" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button>';
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

}