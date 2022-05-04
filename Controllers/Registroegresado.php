<?php

/*importacion de librerias*/
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;



class registroegresado extends Controllers
{
	public function __construct()
	{
		session_start();
		parent::__construct();

		//session_regenerate_id(true);
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(8);
	}

	public function registroegresado()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Expoferia";
		$data['page_title'] = "EGRESADOS <small>Expoferia</small>";
		$data['page_name'] = "egresados";
		$data['page_functions_js'] = "functions_registroegresado.js";
		$this->views->getView($this, "registroegresado", $data);
	}

	public function setUsuario()
	{

		$ultimoregistro = null;


		//$nombre = null;

		if ($_FILES['dataCliente']['name'] == "") {

			$arrResponse = array("status" => false, "msg" => 'No se selecciono ningún documento.');
		} else {

			if ($_POST) {

				$tipo       = $_FILES['dataCliente']['type'];
				$tamanio    = $_FILES['dataCliente']['size'];
				$archivotmp = $_FILES['dataCliente']['tmp_name'];



				//$nombreArchivo = 'oficiosEmitidos.xlsx';
				/*nombre del Archivo: vamos a cargar el archivo para poderr leer*/
				$documento = IOFactory::load($archivotmp);
				/*numero de pestañas a leer*/
				//$totalHojas = $documento->getSheetCount();
				/*recorrido por hoja*/
				//for($indiceHoja=0;$indiceHoja<$totalHojas;$indiceHoja++){
				$hojaActual = $documento->getSheet(0); /* el 0 por que la hoja es la numero 0*/
				//}

				/*calcular cuantas filas tienen informacion (para que no lea todas las files que puede contener la hoja)  */
				$numeroFilas = $hojaActual->getHighestDataRow();
				/*ultima letra con datos */
				$letra = $hojaActual->getHighestDataColumn();

				$numeroLetra = Coordinate::columnIndexFromString($letra);

				$registrados = 0;

				for ($indiceFila = 2; $indiceFila <= $numeroFilas; $indiceFila++) {

					$valorA = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
					/*numeroMatricula*/
					$valorB = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
					/*ApellidoPaterno*/
					$valorC = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
					/*ApellidoMaterno*/
					$valorD = $hojaActual->getCellByColumnAndRow(4, $indiceFila);
					/*nombres*/
					$valorE = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
					/*dni,contrasenia*/
					$valorF = $hojaActual->getCellByColumnAndRow(6, $indiceFila);
					/*direccion*/
					$valorG = $hojaActual->getCellByColumnAndRow(7, $indiceFila);
					/*telefonoFijo*/
					$valorH = $hojaActual->getCellByColumnAndRow(8, $indiceFila);
					/*celular*/
					$valorI = $hojaActual->getCellByColumnAndRow(9, $indiceFila);
					/*email*/
					$valorJ = $hojaActual->getCellByColumnAndRow(10, $indiceFila);
					/*sexo*/
					$valorK = $hojaActual->getCellByColumnAndRow(11, $indiceFila);
					/*idEscuela*/
					$valorL = $hojaActual->getCellByColumnAndRow(12, $indiceFila);

					$cantidadBanner = $this->model->validardni($valorE);

					if ($cantidadBanner == null) {

						//registro tabla usuario
						$registrados++;
						$ultimoregistro = $this->model->insertUsuarioEgresado($valorB, $valorC, $valorD, 	$valorE, $valorH, $valorE, $valorI);
						//registro tabla egresado
						$ultimoregistro = $this->model->insertEgresado($valorA, $valorF, $valorG, 	$valorI, $valorJ, $valorK, $valorL, $ultimoregistro);
					}
				}

				if ($ultimoregistro > 0) {
					$arrResponse = array("status" => true, "msg" => 'Se registro ' . $registrados . ' egresados ');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos revisar si el Documento tiene datos o el Dni ya se encuentra registrado.');
				}
			}
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

		die();
	}

	//listado de los egresados
	public function getBanners()
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->listadoBanner();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewBanner(' . $arrData[$i]['idpersona'] . ')" title="Ver Egresado"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					if (($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
						($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1)
					) {
						$btnEdit = '<button class="btn btn-primary  btn-sm fntEditBanner" onClick="fntEditBanner(this,' . $arrData[$i]['idpersona'] . ')" title="Editar Egresado"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
						($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1)
					) {
						$btnDelete = '<button class="btn btn-danger btn-sm fntDelBanner" onClick="fntDelBanner(' . $arrData[$i]['idpersona'] . ')" title="Eliminar Egresado"><i class="far fa-trash-alt"></i></button>';
					} else {
						$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
					}
				}
				$imagen = 'ver imagen';
				$arrData[$i]['imagen'] = '<a href="' . base_url() . '/Assets/archivos/egresados/' . $arrData[$i]['imagen'] . '"target="_blank"><span class="badge badge-primary"  >' . $imagen . '</span></a> ';
				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//insertar y actualizar los Banners
	public function setBanner()
	{

		$insert = 0;
		if ($_POST) {
			if (empty($_POST['nombres'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en el Banner nose envio.');
			} else {
				$idUsuario = intval($_POST['idBanner']);

				$nombres = trim($_POST['nombres']);
				$apellidop = trim($_POST['apellidop']);
				$apellidom = trim($_POST['apellidom']);
				$email_user = trim($_POST['email_user']);
				$dni = trim($_POST['dni']);
				$telefono = trim($_POST['telefono']);
				$numeroMatricula = trim($_POST['numeroMatricula']);
				$direccion = trim($_POST['direccion']);
				$telefonoFijo = trim($_POST['telefonoFijo']);
				$sexo = trim($_POST['sexo']);
				$idescuela = $_POST['idescuela'];
				$idsede = $_POST['idsede'];

				$password = $dni;

				$request_user = "";
				if ($idUsuario == 0) {

					$option = 1;

					$cantidadBanner = $this->model->validardni($dni);

					if ($cantidadBanner == null) {

						$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
						$nombre = $_FILES['archivoSubido']['name'];

						$imagen = $dni . $nombre;

						if (!file_exists('Assets/archivos/egresados/')) {
							mkdir('Assets/archivos/egresados/', 0777, true);
							if (file_exists('Assets/archivos/egresados/')) {
								if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/egresados/' . $imagen)) {
									$iduser = $this->model->agregarusuario($nombres, $apellidop, $apellidom, $email_user, $password, $imagen, $dni, $telefono);
									$insert = $this->model->agregaregresado($numeroMatricula, $direccion, $telefonoFijo, $sexo, $idescuela, $idsede, $iduser);
								} else {
									echo "no se pudo guardar";
								}
							}
						} else {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/egresados/' . $imagen)) {
								$iduser = $this->model->agregarusuario($nombres, $apellidop, $apellidom, $email_user, $password, $imagen, $dni, $telefono);
								$insert = $this->model->agregaregresado($numeroMatricula, $direccion, $telefonoFijo, $sexo, $idescuela, $idsede, $iduser);
							} else {
								echo "no se pudo guardar";
							}
						}

						if ($insert > 0) {

							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						} else {
							$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
						}
					} else {
						$arrResponse = array("status" => false, "msg" => 'el dni ya se encuentra registrado.');
						//echo "el dni ya se encuentra registrado";
					}
				} else {

					//ACTUALIZARRRRRRRRRRRRRRRRRRRRRRRRRR	

					$option = 2;

					//sin imagen
					if ($_FILES['archivoSubido']['name'] == "") {

						$iduser = $this->model->updateusuario($nombres, $apellidop, $apellidom, $email_user, $password, $dni, $telefono, $idUsuario);
						$iduser2 = $this->model->updateegresado($numeroMatricula, $direccion, $telefonoFijo, $sexo, $idescuela, $idsede, $idUsuario);

						if ($iduser2 > 0) {

							$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
						} else {
							$arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
						}
					} else {
						//con imagen


						$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
						$nombre = $_FILES['archivoSubido']['name'];

						$imagen = $dni . $nombre;

						if (!file_exists('Assets/archivos/egresados/')) {
							mkdir('Assets/archivos/egresados/', 0777, true);
							if (file_exists('Assets/archivos/egresados/')) {
								if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/egresados/' . $imagen)) {
									$iduser = $this->model->updateusuarioimg($nombres, $apellidop, $apellidom, $email_user, $password, $dni, $telefono, $idUsuario, $imagen);
									$iduser2 = $this->model->updateegresadoimg($numeroMatricula, $direccion, $telefonoFijo, $sexo, $idescuela, $idsede, $idUsuario);
								} else {
									echo "no se pudo guardar";
								}
							}
						} else {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/egresados/' . $imagen)) {
								$iduser = $this->model->updateusuarioimg($nombres, $apellidop, $apellidom, $email_user, $password, $dni, $telefono, $idUsuario, $imagen);
								$iduser2 = $this->model->updateegresadoimg($numeroMatricula, $direccion, $telefonoFijo, $sexo, $idescuela, $idsede, $idUsuario);
							} else {
								echo "no se pudo guardar";
							}
						}

						if ($iduser2 > 0) {

							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						} else {
							$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
						}
					}
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//obtener un baner para actualizar
	public function getunBanner($idpersona)
	{
		if ($_SESSION['permisosMod']['r']) {
			$idusuario = intval($idpersona);
			if ($idusuario > 0) {
				$arrData = $this->model->getunBanner($idusuario);
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
				$idpersona = intval($_POST['IdBaner']);
				$requestDelete = $this->model->deleteBanner($idpersona);
				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado un Egresado');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Egresado.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}


	public function getFacultades()
	{
		$htmlOptions = "";
		$arrData = $this->model->getFacultades();
		if (count($arrData) > 0) {
			for ($i = 0; $i < count($arrData); $i++) {
				if ($arrData[$i]['status'] == 1) {
					$htmlOptions .= '<option value="' . $arrData[$i]['idFacultad'] . '">' . $arrData[$i]['nombreFacultad'] . '</option>';
				}
			}
		}
		echo $htmlOptions;
		die();
	}

	//getIdiomas
	public function getIdiomas()
	{
		$search = "";

		if ($_SESSION['permisosMod']['r']) {

			if (!isset($_POST['palabraClave'])) {

				$arrData = $this->model->selectIdiomas();
			} else {
				$search = $_POST['palabraClave'];

				$arrData = $this->model->selectIdiomass($search);
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//getIdiomas
	public function getFacultad()
	{
		$search = "";

		if ($_SESSION['permisosMod']['r']) {

			if (!isset($_POST['palabraClave'])) {

				$arrData = $this->model->selectIdio();
			} else {
				$search = $_POST['palabraClave'];

				$arrData = $this->model->selectIdiom($search);
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}


	//getIdiomas
	public function getEscue($idpersona)
	{
		$search = "";

		if ($_SESSION['permisosMod']['r']) {

			if (!isset($_POST['palabraClave'])) {

				$arrData = $this->model->selectEsc($idpersona);
			} else {
				$search = $_POST['palabraClave'];

				$arrData = $this->model->selectEscue($search);
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
