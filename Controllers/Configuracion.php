<?php

class configuracion extends Controllers
{
	public function __construct()
	{
		session_start();
		//session_regenerate_id(true);
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(28);
	}
	//pagina configuracion egresado
	public function configuracionegresado()
	{
		dep($_SESSION['permisos'][28]['u']);

		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Configuracion Egresado";
		$data['page_title'] = "Configuracione Egresado <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-Configuración Egresado";
		$data['page_functions_js'] = "functions_configuracionegresado.js";
		$this->views->getView($this, "configuracionegresado", $data);
	}

	//obtener datos del egresado
	public function getoneEgresado()
	{
		if ($_SESSION['permisos'][28]['r']) {
			$arrData = $this->model->getoneEgresado($_SESSION['idUser']);
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
					//	sessionUser($_SESSION['idUser']);
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

				if (!file_exists('Assets/archivos/usuarios/')) {
					mkdir('Assets/archivos/usuarios/', 0777, true);
					if (file_exists('Assets/archivos/usuarios/')) {
						if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/usuarios/' . $nuevonombre)) {
							$request_user = $this->model->updateFoto($idUsuario, $nuevonombre);
						} else {
							echo "no se pudo guardar";
						}
					}
				} else {
					if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/usuarios/' . $nuevonombre)) {
						$request_user = $this->model->updateFoto($idUsuario, $nuevonombre);
					} else {
						echo "no se pudo guardarrr";
					}
				}

				if ($request_user) {
					//sessionUser($_SESSION['idUser']);
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
				}

				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
	}

	public function postgradoegresado()
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
					//	sessionUser($_SESSION['idUser']);
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
				}

				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
	}

	public function registrarPostgradp()
	{
		if ($_POST) {
			if (empty($_POST['txtTitulo']) || empty($_POST['txtInstitucion']) || empty($_POST['txtTipo']) || empty($_POST['txtCursando']) || empty($_POST['txtDesde'])) {
				$arrResponse = array("status" => false, "msg" => 'Los campos con (*) no pueden estar vacios.');
			} else {

				$idpostgradoegresado = intval($_POST['idpostgradoegresado']);
				$txtTitulo = strClean($_POST['txtTitulo']);
				$txtInstitucion = strClean($_POST['txtInstitucion']);
				$txtTipo = strClean($_POST['txtTipo']);
				$txtCursando = strClean($_POST['txtCursando']);
				$txtDesde = strClean($_POST['txtDesde']);
				$txtHasta = strClean($_POST['txtHasta']);
				$egresadoid = $_SESSION['Egresado'];

				if ($idpostgradoegresado == 0) {
					$option = 1;
					$insert = $this->model->setregistrarPostgradp($txtTitulo, $txtInstitucion, $txtTipo, $txtCursando, $txtDesde, $txtHasta, $egresadoid);
				} else {
					$option = 2;

					$insert = $this->model->updateregistrarPostgradp($idpostgradoegresado, $txtTitulo, $txtInstitucion, $txtTipo, $txtCursando, $txtDesde, $txtHasta, $egresadoid);
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

				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
	}

	/*DATOS DEL POSTGRADO*/
	public function getPostgrado()
	{
		$egresadoid = $_SESSION['Egresado'];
		if ($_SESSION['permisosMod']['r']) {

			$arrData = $this->model->getPostgrado($egresadoid);

			foreach ($arrData as &$line) {

				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				if ($_SESSION['permisos'][28]['u']) {
					$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditPostgrado(' . $line['idpostgradoegresado'] . ')" title="Editar Postgrado"><i class="fas fa-pencil-alt"></i></button>';
				} else {
					$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
				}

				if ($_SESSION['permisos'][28]['d']) {
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDeletePostgrado(' . $line['idpostgradoegresado'] . ')" title="Eliminar Postgrado"><i class="far fa-trash-alt"></i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}
				$line['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}


			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//obtener un baner para actualizar
	public function getonePostgrado($id)
	{
		if ($_SESSION['permisos'][28]['r']) {
			$id = intval($id);
			if ($id > 0) {
				$arrData = $this->model->getonePostgrado($id);
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


	//obtener un baner para actualizar
	public function deletePostgrado($id)
	{
		if ($_SESSION['permisos'][28]['d']) {
			$id = intval($id);
			if ($id > 0) {
				$requestDelete = $this->model->deletePostgrado($id);
				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Postgrado');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Postgrado.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}





















	//listado de los banners
	public function get()
	{
		if ($_SESSION['permisosMod']['r']) {
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
						$btnEdit = '<button class="btn btn-primary  btn-sm fntEdit" onClick="fntEdit(this,' . $arrData[$i]['IdBaner'] . ')" title="Editar Banner"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
						$btnDelete = '<button class="btn btn-danger btn-sm fntDelete" onClick="fntDelete(' . $arrData[$i]['IdBaner'] . ')" title="Eliminar Banner"><i class="far fa-trash-alt"></i></button>';
					} else {
						$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
					}
				}
				$arrData[$i]['NombreArchivo'] = '<a href="' . base_url() . '/Assets/archivos/banner/' . $arrData[$i]['NombreArchivo'] . '"target="_blank"><span class="badge badge-primary"  > Ver Imagen <i class="fas fa-image"></i></span></a> ';

				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//insertar y actualizar los Banners
	public function set()
	{
		if ($_POST) {
			if (empty($_POST['txtNombre'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en el Banner.');
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

	//borrar un banner
	public function delete()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$IdBaner = intval($_POST['IdBaner']);
				$NombreArchivo = $this->model->getOne($IdBaner);
				//borrar documentos
				$requestDelete = $this->model->remove($IdBaner);
				@unlink('Assets/archivos/banner/' . $NombreArchivo['NombreArchivo']);
				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Banner');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Bnner.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}
}
