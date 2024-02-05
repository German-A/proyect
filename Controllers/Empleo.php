<?php

class empleo extends Controllers
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
		getPermisos(20);
	}
	//pagina Banner
	public function empleo($id)
	{
		$this->idempleo = $id;
		// if (empty($_SESSION['permisosMod']['r'])) {
		// 	header("Location:" . base_url() . '/dashboard');
		// }
		$arrData = $this->model->listaa($this->idempleo);

		$data['page_tag'] = "Usuarios";
		$data['page_title'] = "Empleo-<small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-banner";
		$data['idempleo'] = $this->idempleo;
		$data['page_functions_js'] = "functions_empleo.js";

		$data['idEmpleos'] = $arrData['idEmpleos'];
		$data['nombreEmpresa'] = $arrData['nombreEmpresa'];
		$data['NombrePuesto'] = $arrData['NombrePuesto'];
		$data['DescripcionPuesto'] = $arrData['DescripcionPuesto'];
		$data['InformacionAdicional'] = $arrData['InformacionAdicional'];
		$data['LugarTrabajo'] = $arrData['LugarTrabajo'];
		$data['TrabajoRemoto'] = $arrData['TrabajoRemoto'];
		$data['NumeroVacantes'] = $arrData['NumeroVacantes'];
		$data['Experiencias'] = $arrData['Experiencias'];
		$data['TipoContrato'] = $arrData['TipoContrato'];
		$data['JornadaLaboral'] = $arrData['JornadaLaboral'];
		$data['HorasSemanales'] = $arrData['HorasSemanales'];
		$data['HorarioTrabajo'] = $arrData['HorarioTrabajo'];
		$data['RemuneracionBruta'] = $arrData['RemuneracionBruta'];
		$data['Contacto'] = $arrData['Contacto'];
		$data['FechaInico'] = $arrData['FechaInico'];
		$data['FechaFin'] = $arrData['FechaFin'];
		$data['FechaInico'] = $arrData['FechaInico'];
		$data['FechaFin'] = $arrData['FechaFin'];

		$this->views->getView($this, "empleo", $data);
	}


	//borrar un banner
	public function postular()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$empleoid = intval($_POST['empleoid']);
				$idpersona = 1;
				$requestDelete = 0;

				$postulado = $this->model->validarpostular($empleoid, $idpersona);

				if ($postulado) {

					if ($requestDelete) {
						$arrResponse = array('status' => true, 'msg' => 'Ya esta inscrito en la convocatoria');
					} else {
						$arrResponse = array('status' => false, 'msg' => 'Ya se encuentra inscrito en la convocatoria.');
					}
					echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
				} else {
					$requestDelete = $this->model->postular($empleoid, $idpersona);
					if ($requestDelete) {
						$arrResponse = array('status' => true, 'msg' => 'Se ha inscrito a la convocatoria');
					} else {
						$arrResponse = array('status' => false, 'msg' => 'Error al inscribir convocatoria.');
					}
					echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
				}
			}
		}
		die();
	}


	//listado de los banners
	public function get($idempleo)
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->listaa($idempleo);

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
