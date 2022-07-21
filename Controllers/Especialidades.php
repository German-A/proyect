<?php

class especialidades extends Controllers
{
	public function __construct()
	{
		session_start();
		//session_regenerate_id(true);
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(23);
	}
	//pagina Banner
	public function especialidades()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Especialidades";
		$data['page_title'] = "Banner <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-banner";
		$data['page_functions_js'] = "functions_especialidades.js";
		$this->views->getView($this, "especialidades", $data);
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
					$btnView = '<button class="btn btn-info btn-sm fntView" onClick="fntView(' . $arrData[$i]['idespecialidades'] . ')" title="Ver Banner"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
						$btnEdit = '<button class="btn btn-primary  btn-sm fntEdit" onClick="fntEdit(this,' . $arrData[$i]['idespecialidades'] . ')" title="Editar Banner"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
						$btnDelete = '<button class="btn btn-danger btn-sm fntDelete" onClick="fntDelete(' . $arrData[$i]['idespecialidades'] . ')" title="Eliminar Banner"><i class="far fa-trash-alt"></i></button>';
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


	//obtener un baner para actualizar
	public function getcantidades()
	{
		$id = intval($_POST['id']);

		if ($id > 0) {
			$arrData = $this->model->getCantidades($id);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}

		die();
	}

	//insertar y actualizar los Banners
	public function set()
	{
		if ($_POST) {
			if (empty($_POST['numeroresolucion'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en el Banner.');
			} else {
				$idUsuario = intval($_POST['id']);

				$numeroresolucion = $_POST['numeroresolucion'];
				$fecharesolucion = $_POST['fecharesolucion'];

				$escuelaid = $_POST['escuelaid'];
				$bachiller = $_POST['bachiller'];
				$titulo = $_POST['titulo'];
				$segundaespecialidad = $_POST['segundaespecialidad'];


				$request_user = "";
				if ($idUsuario == 0) {

					$option = 1;

					$insert = $this->model->register($bachiller, $titulo, $segundaespecialidad, $escuelaid);
				} else {
					$option = 2;

					$cantidadBanner = "";
					$cantidadBanner = $this->model->cantidadBanner();

					//Actualizar sin Imagen


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

	//insertar y actualizar los postgrado
	public function setpostgrado()
	{
		if ($_POST) {
			if (empty($_POST['tipopostgrado'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en el Banner.');
			} else {
				$idUsuario = intval($_POST['id']);

				$tipopostgrado = $_POST['tipopostgrado'];
				$escuelaid = $_POST['escuelaid'];

				$request_user = "";
				if ($idUsuario == 0) {

					$option = 1;

					$insert = $this->model->registerpostgrado($tipopostgrado,  $escuelaid);
				} else {
					$option = 2;

					$cantidadBanner = "";
					$cantidadBanner = $this->model->cantidadBanner();

					//Actualizar sin Imagen


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

	//listado de los banners
	public function getpostgrado()
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->listapostgrado();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm fntView" onClick="fntView(' . $arrData[$i]['idpostgrado'] . ')" title="Ver Banner"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
						$btnEdit = '<button class="btn btn-primary  btn-sm fntEdit" onClick="fntEdit(this,' . $arrData[$i]['idpostgrado'] . ')" title="Editar Banner"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
						$btnDelete = '<button class="btn btn-danger btn-sm fntDelete" onClick="fntDelete(' . $arrData[$i]['idpostgrado'] . ')" title="Eliminar Banner"><i class="far fa-trash-alt"></i></button>';
					} else {
						$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
					}
				}

				$arrData[$i]['options'] = '<div class="text-center"> ' .  $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	/***************************************************************************
	
	PERFILES ACADEMICOS

	 ****************************************************************************/
	public function pefilesAcademicos()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Especialidades";
		$data['page_title'] = "Perfiles Academicos-<small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-banner";
		$data['page_functions_js'] = "functions_pefilesAcademicos.js";
		$this->views->getView($this, "pefilesAcademicos", $data);
	}


	//listado de los perfiles academicos
	public function getperfilesacademicos()
	{

		$arrData = $this->model->listaperfilesacademicos();
		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';
			if ($_SESSION['permisosMod']['r']) {
				$btnView = '<button class="btn btn-info btn-sm fntView" onClick="fntView(' . $arrData[$i]['idperfilesacademicos'] . ')" title="Ver Banner"><i class="far fa-eye"></i></button>';
			}
			if ($_SESSION['permisosMod']['u']) {
				if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
					$btnEdit = '<button class="btn btn-primary  btn-sm fntEdit" onClick="fntEdit(this,' . $arrData[$i]['idperfilesacademicos'] . ')" title="Editar Banner"><i class="fas fa-pencil-alt"></i></button>';
				} else {
					$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
				}
			}
			if ($_SESSION['permisosMod']['d']) {
				if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
					$btnDelete = '<button class="btn btn-danger btn-sm fntDelete" onClick="fntDelete(' . $arrData[$i]['idperfilesacademicos'] . ')" title="Eliminar Banner"><i class="far fa-trash-alt"></i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}
			}

			$arrData[$i]['options'] = '<div class="text-center"> ' . $btnDelete . '</div>';
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

		die();
	}
	//facultades

	//insertar y actualizar los perfiles academicos
	public function setPerfilesAcademicos()
	{
		if ($_POST) {
			if (empty($_POST['escuela'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en el Banner.');
			} else {
				$idUsuario = intval($_POST['id']);


				$escuela = $_POST['escuela'];
				$año = $_POST['año'];


				$request_user = "";

				if ($idUsuario == 0) {

					$option = 1;

					$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
					$nombre = $_FILES['archivoSubido']['name'];

					$nuevonombre =  $nombre;

					if (!file_exists('Assets/archivos/perfilacademicos/')) {
						mkdir('Assets/archivos/perfilacademicos/', 0777, true);
						if (file_exists('Assets/archivos/perfilacademicos/')) {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/perfilacademicos/' . $nuevonombre)) {
								$insert = $this->model->registerPerfilesAcademicos($escuela, $nuevonombre, $año);
							} else {
								echo "no se pudo guardar ";
							}
						}
					} else {
						if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/perfilacademicos/' . $nuevonombre)) {
							$insert = $this->model->registerPerfilesAcademicos($escuela, $nuevonombre, $año);
						} else {
							echo "no se pudo guardar";
						}
					}
				} else {
					$option = 2;

					$cantidadBanner = "";
					$cantidadBanner = $this->model->cantidadBanner();

					//Actualizar sin Imagen


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

	//borrar los perfiles academicos
	public function deleteperfilesacademico()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$IdBaner = intval($_POST['IdBaner']);
				$requestDelete = $this->model->getOne($IdBaner);
				//borrar documentos
				//$requestDelete = $this->model->remove($IdBaner);
				//@unlink('Assets/archivos/banner/' . $NombreArchivo['NombreArchivo']);
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

	//getCarreras
	public function getEscuelas()
	{
		$search = "";

		if ($_SESSION['permisosMod']['r']) {

			if (!isset($_POST['palabraClave'])) {

				$arrData = $this->model->selectCarreras();
			} else {
				$search = $_POST['palabraClave'];

				$arrData = $this->model->selectCarrerass($search);
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}




	/***************************************************************************
	
	OBJETIVOS EDUCACIONALES

	 ****************************************************************************/
	public function objetivosEducacionales()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Especialidades";
		$data['page_title'] = "Perfiles Academicos-<small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-banner";
		$data['page_functions_js'] = "functions_objetivosEducacionaless.js";
		$this->views->getView($this, "objetivosEducacionales", $data);
	}


	//listado de los perfiles academicos
	public function getobjetivosEducacionales()
	{

		$arrData = $this->model->listaobjetivosEducacionales();
		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';
			if ($_SESSION['permisosMod']['r']) {
				$btnView = '<button class="btn btn-info btn-sm fntView" onClick="fntView(' . $arrData[$i]['idobjetivoseducacionales'] . ')" title="Ver Banner"><i class="far fa-eye"></i></button>';
			}
			if ($_SESSION['permisosMod']['u']) {
				if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
					$btnEdit = '<button class="btn btn-primary  btn-sm fntEdit" onClick="fntEdit(this,' . $arrData[$i]['idobjetivoseducacionales'] . ')" title="Editar Banner"><i class="fas fa-pencil-alt"></i></button>';
				} else {
					$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
				}
			}
			if ($_SESSION['permisosMod']['d']) {
				if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
					$btnDelete = '<button class="btn btn-danger btn-sm fntDelete" onClick="fntDelete(' . $arrData[$i]['idobjetivoseducacionales'] . ')" title="Eliminar Banner"><i class="far fa-trash-alt"></i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}
			}

			$arrData[$i]['options'] = '<div class="text-center"> ' . $btnDelete . '</div>';
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

		die();
	}
	//facultades

	//insertar y actualizar los perfiles academicos
	public function setobjetivosEducacionales()
	{
		if ($_POST) {
			if (empty($_POST['escuela'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en el Banner.');
			} else {
				$idUsuario = intval($_POST['id']);


				$escuela = $_POST['escuela'];
				$año = $_POST['año'];


				$request_user = "";

				if ($idUsuario == 0) {

					$option = 1;

					$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
					$nombre = $_FILES['archivoSubido']['name'];

					$nuevonombre =  $escuela.$nombre;

					if (!file_exists('Assets/archivos/objetivosEducacionales/')) {
						mkdir('Assets/archivos/objetivosEducacionales/', 0777, true);
						if (file_exists('Assets/archivos/objetivosEducacionales/')) {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/objetivosEducacionales/' . $nuevonombre)) {
								$insert = $this->model->registerobjetivosEducacionales($escuela, $nuevonombre, $año);
							} else {
								echo "no se pudo guardar ";
							}
						}
					} else {
						if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/objetivosEducacionales/' . $nuevonombre)) {
							$insert = $this->model->registerobjetivosEducacionales($escuela, $nuevonombre, $año);
						} else {
							echo "no se pudo guardar";
						}
					}
				} else {
					$option = 2;
					$cantidadBanner = "";
					$cantidadBanner = $this->model->cantidadBanner();
					//Actualizar sin Imagen
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

	//borrar los perfiles academicos
	public function deleteobjetivosEducacionales()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$IdBaner = intval($_POST['IdBaner']);
				$requestDelete = $this->model->getOne($IdBaner);
				//borrar documentos
				//$requestDelete = $this->model->remove($IdBaner);
				//@unlink('Assets/archivos/banner/' . $NombreArchivo['NombreArchivo']);
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



		/***************************************************************************
	
	PREGUNTAS OBJETIVOS EDUCACIONALES

	 ****************************************************************************/
	public function preguntasObjetivosEducacionales()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Especialidades";
		$data['page_title'] = "Perfiles Academicos-<small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-banner";
		$data['page_functions_js'] = "functions_preguntasObjetivosEducacionaless.js";
		$this->views->getView($this, "preguntasObjetivosEducacionales", $data);
	}


	//listado de los preguntas objetivosEducacionales
	public function getpreguntasObjetivosEducacionales()
	{

		$arrData = $this->model->listapreguntasObjetivosEducacionales();
		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';
			if ($_SESSION['permisosMod']['r']) {
				$btnView = '<button class="btn btn-info btn-sm fntView" onClick="fntView(' . $arrData[$i]['idpreguntasobjetivoseducacionales'] . ')" title="Ver Banner"><i class="far fa-eye"></i></button>';
			}
			if ($_SESSION['permisosMod']['u']) {
				if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
					$btnEdit = '<button class="btn btn-primary  btn-sm fntEdit" onClick="fntEdit(this,' . $arrData[$i]['idpreguntasobjetivoseducacionales'] . ')" title="Editar Banner"><i class="fas fa-pencil-alt"></i></button>';
				} else {
					$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
				}
			}
			if ($_SESSION['permisosMod']['d']) {
				if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
					$btnDelete = '<button class="btn btn-danger btn-sm fntDelete" onClick="fntDelete(' . $arrData[$i]['idpreguntasobjetivoseducacionales'] . ')" title="Eliminar Banner"><i class="far fa-trash-alt"></i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}
			}

			$arrData[$i]['options'] = '<div class="text-center"> ' . $btnDelete . '</div>';
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

		die();
	}
	//facultades

	//insertar y actualizar los perfiles academicos
	public function setpreguntasObjetivosEducacionales()
	{
		if ($_POST) {
			if (empty($_POST['escuela'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en el Banner.');
			} else {
				$idUsuario = intval($_POST['id']);


				$escuela = $_POST['escuela'];
				$año = $_POST['año'];
				$cantidadPreguntas = $_POST['cantidadPreguntas'];
				


				$request_user = "";

				if ($idUsuario == 0) {

					$option = 1;

					$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
					$nombre = $_FILES['archivoSubido']['name'];

					$nuevonombre =  $escuela.$nombre;

					if (!file_exists('Assets/archivos/preguntasObjetivosEducacionales/')) {
						mkdir('Assets/archivos/preguntasObjetivosEducacionales/', 0777, true);
						if (file_exists('Assets/archivos/preguntasObjetivosEducacionales/')) {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/preguntasObjetivosEducacionales/' . $nuevonombre)) {
								$insert = $this->model->registerpreguntasObjetivosEducacionales($escuela, $nuevonombre, $año,$cantidadPreguntas);
							} else {
								echo "no se pudo guardar ";
							}
						}
					} else {
						if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/preguntasObjetivosEducacionales/' . $nuevonombre)) {
							$insert = $this->model->registerpreguntasObjetivosEducacionales($escuela, $nuevonombre, $año,$cantidadPreguntas);
						} else {
							echo "no se pudo guardar";
						}
					}
				} else {
					$option = 2;
					$cantidadBanner = "";
					$cantidadBanner = $this->model->cantidadBanner();
					//Actualizar sin Imagen
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

	//borrar los perfiles academicos
	public function deletepreguntasobjetivosEducacionales()
	{
		// if ($_POST) {
		// 	if ($_SESSION['permisosMod']['d']) {
		// 		$IdBaner = intval($_POST['IdBaner']);
		// 		$requestDelete = $this->model->getOne($IdBaner);
		// 		//borrar documentos
		// 		//$requestDelete = $this->model->remove($IdBaner);
		// 		//@unlink('Assets/archivos/banner/' . $NombreArchivo['NombreArchivo']);
		// 		if ($requestDelete) {
		// 			$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Banner');
		// 		} else {
		// 			$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Bnner.');
		// 		}
		// 		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		// 	}
		// }
		die();
	}

	

}
