<?php

class expoferialaboralxvadmin extends Controllers
{
	public function __construct()
	{
		session_start();
		//session_regenerate_id(true);
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(29);
	}

	//pagina galeria
	public function galeria()
	{

		if ($_SESSION['permisos'][29]['r'] == 0) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Expoferialaboralxv Galeria";
		$data['page_title'] = "Expoferialaboralxv Galeria";
		$data['page_name'] = "USE - Expoferia Laboral xv";

		$this->views->getView($this, "galeria", $data);
	}

	//listado de los Galeria
	public function getGaleria()
	{
		if ($_SESSION['permisos'][29]['r']) {
			$arrData = $this->model->listGaleria();

			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				if ($_SESSION['permisos'][29]['r']) {
					$btnView = '<button class="btn btn-info btn-sm fntView" onClick="fntView(' . $arrData[$i]['idexpoxvgaleria'] . ')" title="Ver Galería"><i class="far fa-eye"></i></button>';
				}

				if ($_SESSION['permisos'][29]['u']) {
					$btnEdit = '<button class="btn btn-primary  btn-sm " onClick="fntEditGaleria(' . $arrData[$i]['idexpoxvgaleria'] . ')" title="Editar Galería"><i class="fas fa-pencil-alt"></i></button>';
				} else {
					$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
				}

				if ($_SESSION['permisos'][29]['d']) {
					$btnDelete = '<button class="btn btn-danger btn-sm " onClick="fntDeleteGaleria(' . $arrData[$i]['idexpoxvgaleria'] . ')" title="Eliminar Galería"><i class="far fa-trash-alt"></i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}

				if ($arrData[$i]['status'] == 1) {
					$arrData[$i]['status'] = '<span class="badge badge-success">Habilitado</span>';
				} else {
					$arrData[$i]['status'] = '<span class="badge badge-danger">Eliminado</span>';
				}


				$arrData[$i]['archivo'] = '<a href="' . base_url() . '/Assets/archivos/exporiaxv/' . $arrData[$i]['archivo'] . '"target="_blank"><span class="badge badge-primary"  > Ver Imagen <i class="fas fa-image"></i></span></a> ';

				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//insertar y actualizar los Galeria
	public function setgaleria()
	{
		if ($_POST) {
			if (empty($_POST['txtNombre']) || empty($_POST['txtPosicion'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en la Galería.');
			} else {

				$idexpoxvgaleria = intval($_POST['idexpoxvgaleria']);
				$txtNombre = trim($_POST['txtNombre']);
				$txtPosicion = trim($_POST['txtPosicion']);

				$ruta = 'Assets/archivos/exporiaxv/';
				$obj['archivo'] = null;

				$bandera = true;

				if ($idexpoxvgaleria == 0) {

					$option = 1;

					$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
					$extension = pathinfo($_FILES['archivoSubido']['name'], PATHINFO_EXTENSION);
					$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;

					while ($bandera) {
						if (!empty($this->model->buscarArchivoGaleria($filename))) {
							$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;
						} else {
							$bandera = false;
						}
					}

					if (!file_exists($ruta)) {
						mkdir($ruta, 0777, true);
						if (file_exists($ruta)) {
							if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
								$insert = $this->model->registerGaleria($txtNombre, $txtPosicion, $filename);
							} else {
								echo "no se pudo guardar ";
							}
						}
					} else {
						if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
							$insert = $this->model->registerGaleria($txtNombre, $txtPosicion, $filename);
						} else {
							echo "no se pudo guardar";
						}
					}
				} else {

					$option = 2;

					//Actualizar sin Imagen
					if (empty($_FILES['archivoSubido']['name'])) {
						$insert = $this->model->updateGaleria($txtNombre, $txtPosicion, $idexpoxvgaleria);
					} else {
						//Actualizar con Imagen				
						$obj = $this->model->getOneGaleria($idexpoxvgaleria);

						$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
						$extension = pathinfo($_FILES['archivoSubido']['name'], PATHINFO_EXTENSION);
						$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;

						while ($bandera) {
							if (!empty($this->model->buscarArchivoGaleria($filename))) {
								$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;
							} else {
								$bandera = false;
							}
						}

						if (!file_exists($ruta)) {
							mkdir($ruta, 0777, true);
							if (file_exists($ruta)) {
								if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
									$insert = $this->model->updateGaleriaArchivo($txtNombre, $txtPosicion, $filename, $idexpoxvgaleria);
								} else {
									echo "no se pudo guardar ";
								}
							}
						} else {
							if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
								$insert = $this->model->updateGaleriaArchivo($txtNombre, $txtPosicion, $filename, $idexpoxvgaleria);
							} else {
								echo "no se pudo guardar";
							}
						}
					}
				}

				if ($insert > 0) {
					if ($option == 1) {
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					}
					if ($option == 2) {
						removeFile($ruta, $obj['archivo']);
						$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
					}
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//obtener una Galeria
	public function getOneGaleria($idexpoxvgaleria)
	{

		if ($_SESSION['permisos'][29]['u']) {
			$idexpoxvgaleria = intval($idexpoxvgaleria);
			if ($idexpoxvgaleria > 0) {
				$arrData = $this->model->getOneGaleria($idexpoxvgaleria);
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

	//borrar un delete Galeria
	public function deleteGaleria($idexpoxvgaleria)
	{

		if ($_SESSION['permisos'][29]['d']) {
			$idexpoxvgaleria = intval($idexpoxvgaleria);

			$archivo = $this->model->getOneGaleria($idexpoxvgaleria);

			$ruta = 'Assets/archivos/exporiaxv/';
			removeFile($ruta, $archivo['archivo']);

			$requestDelete = $this->model->removeGaleria($idexpoxvgaleria);

			if ($requestDelete) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la Imagen');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la Imagen');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}

		die();
	}


	/*PONENCIAS*/

	//pagina PONENCIAS
	public function ponencias()
	{

		if ($_SESSION['permisos'][29]['r'] == 0) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Expoferialaboralxv Ponencias";
		$data['page_title'] = "Expoferialaboralxv Ponencias";
		$data['page_name'] = "USE - Expoferia Laboral xv";

		$this->views->getView($this, "ponencias", $data);
	}

	//listado de los PONENCIAS
	public function getPonencias()
	{
		if ($_SESSION['permisos'][29]['r']) {
			$arrData = $this->model->listPonencias();

			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				if ($_SESSION['permisos'][29]['r']) {
					$btnView = '<button class="btn btn-info btn-sm " onClick="fntView(' . $arrData[$i]['idexpoxvponencias'] . ')" title="Ver Ponencias"><i class="far fa-eye"></i></button>';
				}

				if ($_SESSION['permisos'][29]['u']) {
					$btnEdit = '<button class="btn btn-primary  btn-sm " onClick="fntEditPonencias(' . $arrData[$i]['idexpoxvponencias'] . ')" title="Editar Ponencias"><i class="fas fa-pencil-alt"></i></button>';
				} else {
					$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
				}

				if ($_SESSION['permisos'][29]['d']) {
					$btnDelete = '<button class="btn btn-danger btn-sm " onClick="fntDeletePonencias(' . $arrData[$i]['idexpoxvponencias'] . ')" title="Eliminar Ponencias"><i class="far fa-trash-alt"></i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}

				if ($arrData[$i]['status'] == 1) {
					$arrData[$i]['status'] = '<span class="badge badge-success">Habilitado</span>';
				} else {
					$arrData[$i]['status'] = '<span class="badge badge-danger">Eliminado</span>';
				}


				$arrData[$i]['archivo'] = '<a href="' . base_url() . '/Assets/archivos/exporiaxv/' . $arrData[$i]['archivo'] . '"target="_blank"><span class="badge badge-primary"  > Ver Imagen <i class="fas fa-image"></i></span></a> ';

				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//insertar y actualizar los Ponencias
	public function setPonencias()
	{
		if ($_POST) {
			if (empty($_POST['txtNombre']) || empty($_POST['txtPosicion'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en la Galería.');
			} else {

				$idexpoxvponencias = intval($_POST['idexpoxvponencias']);
				$txtNombre = trim($_POST['txtNombre']);
				$txtPosicion = trim($_POST['txtPosicion']);

				$ruta = 'Assets/archivos/exporiaxv/';
				$obj['archivo'] = null;
				$bandera = true;

				if ($idexpoxvponencias == 0) {

					$option = 1;

					$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
					$extension = pathinfo($_FILES['archivoSubido']['name'], PATHINFO_EXTENSION);
					$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;

					while ($bandera) {
						if (!empty($this->model->buscarArchivoPonencias($filename))) {
							$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;
						} else {
							$bandera = false;
						}
					}

					if (!file_exists($ruta)) {
						mkdir($ruta, 0777, true);
						if (file_exists($ruta)) {
							if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
								$insert = $this->model->registerPonencias($txtNombre, $txtPosicion, $filename);
							} else {
								echo "no se pudo guardar ";
							}
						}
					} else {
						if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
							$insert = $this->model->registerPonencias($txtNombre, $txtPosicion, $filename);
						} else {
							echo "no se pudo guardar";
						}
					}
				} else {
					$option = 2;

					//Actualizar sin Imagen
					if (empty($_FILES['archivoSubido']['name'])) {
						$insert = $this->model->updatePonencia($txtNombre, $txtPosicion, $idexpoxvponencias);
					} else {
						//Actualizar con Imagen				
						$obj = $this->model->getOnePonencia($idexpoxvponencias);

						$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
						$extension = pathinfo($_FILES['archivoSubido']['name'], PATHINFO_EXTENSION);
						$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;

						while ($bandera) {
							if (!empty($this->model->buscarArchivoPonencias($filename))) {
								$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;
							} else {
								$bandera = false;
							}
						}

						if (!file_exists($ruta)) {
							mkdir($ruta, 0777, true);
							if (file_exists($ruta)) {
								if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
									$insert = $this->model->updatePonenciaArchivo($txtNombre, $txtPosicion, $filename, $idexpoxvponencias);
								} else {
									echo "no se pudo guardar ";
								}
							}
						} else {
							if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
								$insert = $this->model->updatePonenciaArchivo($txtNombre, $txtPosicion, $filename, $idexpoxvponencias);
							} else {
								echo "no se pudo guardar";
							}
						}
					}
				}

				if ($insert > 0) {

					if ($option == 1) {
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					}
					if ($option == 2) {
						removeFile($ruta, $obj['archivo']);
						$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
					}
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//obtener un PONENCIAS para actualizar
	public function getOnePonencia($idexpoxvponencias)
	{
		if ($_SESSION['permisos'][29]['u']) {
			$idexpoxvponencias = intval($idexpoxvponencias);
			if ($idexpoxvponencias > 0) {
				$arrData = $this->model->getOnePonencia($idexpoxvponencias);
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

	//borrar un PONENCIAS
	public function deletePonencias($idexpoxvgaleria)
	{

		if ($_SESSION['permisos'][29]['d']) {
			$idexpoxvgaleria = intval($idexpoxvgaleria);
			$NombreArchivo = $this->model->getOnePonencia($idexpoxvgaleria);
			//borrar documentos
			$requestDelete = $this->model->removePonencias($idexpoxvgaleria);
			@unlink('Assets/archivos/exporiaxv/' . $NombreArchivo['archivo']);
			if ($requestDelete) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la Imagen');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la Imagen');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}

		die();
	}



	/*EMPRESAS*/
	//pagina Empresa
	public function empresas()
	{

		if ($_SESSION['permisos'][29]['r'] == 0) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Expoferialaboralxv Empresa";
		$data['page_title'] = "Expoferialaboralxv Empresa";
		$data['page_name'] = "USE - Expoferia Laboral xv";

		$this->views->getView($this, "empresas", $data);
	}

	//listado de los Empresa
	public function getEmpresa()
	{
		if ($_SESSION['permisos'][29]['r']) {
			$arrData = $this->model->listEmpresa();

			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				if ($_SESSION['permisos'][29]['r']) {
					$btnView = '<button class="btn btn-info btn-sm fntView" onClick="fntView(' . $arrData[$i]['idexpoxvempresas'] . ')" title="Ver Empresa"><i class="far fa-eye"></i></button>';
				}

				if ($_SESSION['permisos'][29]['u']) {
					$btnEdit = '<button class="btn btn-primary  btn-sm " onClick="fntEditEmpresa(' . $arrData[$i]['idexpoxvempresas'] . ')" title="Editar Empresa"><i class="fas fa-pencil-alt"></i></button>';
				} else {
					$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
				}

				if ($_SESSION['permisos'][29]['d']) {
					$btnDelete = '<button class="btn btn-danger btn-sm " onClick="fntDeleteEmpresa(' . $arrData[$i]['idexpoxvempresas'] . ')" title="Eliminar Empresa"><i class="far fa-trash-alt"></i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}

				if ($arrData[$i]['status'] == 1) {
					$arrData[$i]['status'] = '<span class="badge badge-success">Habilitado</span>';
				} else {
					$arrData[$i]['status'] = '<span class="badge badge-danger">Eliminado</span>';
				}


				$arrData[$i]['archivo'] = '<a href="' . base_url() . '/Assets/archivos/exporiaxv/' . $arrData[$i]['archivo'] . '"target="_blank"><span class="badge badge-primary"  > Ver Imagen <i class="fas fa-image"></i></span></a> ';

				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//insertar y actualizar los Galeria
	public function setEmpresa()
	{
		if ($_POST) {
			if (empty($_POST['txtNombre']) || empty($_POST['txtPosicion'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en la Galería.');
			} else {

				$idexpoxvempresas = intval($_POST['idexpoxvempresas']);
				$txtNombre = trim($_POST['txtNombre']);
				$txtPosicion = trim($_POST['txtPosicion']);
				$txtUrl = trim($_POST['txtUrl']);

				$ruta = 'Assets/archivos/exporiaxv/';
				$obj['archivo'] = null;

				$bandera = true;

				if ($idexpoxvempresas == 0) {

					$option = 1;

					$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
					$extension = pathinfo($_FILES['archivoSubido']['name'], PATHINFO_EXTENSION);
					$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;

					while ($bandera) {
						if (!empty($this->model->buscarArchivoEmpresa($filename))) {
							$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;
						} else {
							$bandera = false;
						}
					}

					if (!file_exists($ruta)) {
						mkdir($ruta, 0777, true);
						if (file_exists($ruta)) {
							if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
								$insert = $this->model->registerEmpresa($txtNombre, $txtUrl, $txtPosicion, $filename);
							} else {
								echo "no se pudo guardar ";
							}
						}
					} else {
						if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
							$insert = $this->model->registerEmpresa($txtNombre, $txtUrl, $txtPosicion, $filename);
						} else {
							echo "no se pudo guardar";
						}
					}
				} else {

					$option = 2;

					//Actualizar sin Imagen
					if (empty($_FILES['archivoSubido']['name'])) {
						$insert = $this->model->updateEmpresa($txtNombre, $txtUrl, $txtPosicion, $idexpoxvempresas);
					} else {
						//Actualizar con Imagen				
						$obj = $this->model->getOneEmpresa($idexpoxvempresas);

						$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
						$extension = pathinfo($_FILES['archivoSubido']['name'], PATHINFO_EXTENSION);
						$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;

						while ($bandera) {
							if (!empty($this->model->buscarArchivoEmpresa($filename))) {
								$filename = randKey("abcdef9876543210", 10) . round(microtime(true) * 1000) . '.' . $extension;
							} else {
								$bandera = false;
							}
						}

						if (!file_exists($ruta)) {
							mkdir($ruta, 0777, true);
							if (file_exists($ruta)) {
								if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
									$insert = $this->model->updateGaleriaEmpresa($txtNombre, $txtUrl, $txtPosicion, $filename, $idexpoxvempresas);
								} else {
									echo "no se pudo guardar ";
								}
							}
						} else {
							if (move_uploaded_file($ubicacionTemporal, $ruta . $filename)) {
								$insert = $this->model->updateGaleriaEmpresa($txtNombre, $txtUrl, $txtPosicion, $filename, $idexpoxvempresas);
							} else {
								echo "no se pudo guardar";
							}
						}
					}
				}

				if ($insert > 0) {
					if ($option == 1) {
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					}
					if ($option == 2) {
						removeFile($ruta, $obj['archivo']);
						$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
					}
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//obtener una Empresa
	public function getOneEmpresa($idexpoxvempresas)
	{

		if ($_SESSION['permisos'][29]['u']) {
			$idexpoxvempresas = intval($idexpoxvempresas);
			if ($idexpoxvempresas > 0) {
				$arrData = $this->model->getOneEmpresa($idexpoxvempresas);
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

	//borrar un delete Empresa
	public function deleteEmpresa($idexpoxvgaleria)
	{

		if ($_SESSION['permisos'][29]['d']) {
			$idexpoxvempresas = intval($idexpoxvgaleria);

			$archivo = $this->model->getOneEmpresa($idexpoxvempresas);

			$ruta = 'Assets/archivos/exporiaxv/';
			removeFile($ruta, $archivo['archivo']);

			$requestDelete = $this->model->removeEmpresa($idexpoxvempresas);

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
