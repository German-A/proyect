<?php

class solicitudempleo extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}
	//pagina Banner
	public function solicitudempleo()
	{
		$data['page_tag'] = "Banner";
		$data['page_title'] = "Banner <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-banner";
		$data['page_functions_js'] = "functions_solicutempleo.js";
		$this->views->getView($this, "solicitudempleo", $data);
	}
	//listado de los banners



	//getTitulaciones
	public function getTitulaciones()
	{
		$search = "";
		if (!isset($_POST['palabraClave'])) {
			$arrData = $this->model->selectTitulaciones();
		} else {
			$search = $_POST['palabraClave'];
			$arrData = $this->model->selectTitulacioness($search);
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	//getCarreras
	public function getCarreras()
	{
		$search = "";
		if (!isset($_POST['palabraClave'])) {
			$arrData = $this->model->selectCarreras();
		} else {
			$search = $_POST['palabraClave'];

			$arrData = $this->model->selectCarrerass($search);
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	//getCompetencias
	public function getCompetencias()
	{
		$search = "";
		if (!isset($_POST['palabraClave'])) {
			$arrData = $this->model->selectCompetencias();
		} else {
			$search = $_POST['palabraClave'];
			$arrData = $this->model->selectCompetenciass($search);
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	//getIdiomas
	public function getIdiomas()
	{
		$search = "";
		if (!isset($_POST['palabraClave'])) {
			$arrData = $this->model->selectIdiomas();
		} else {
			$search = $_POST['palabraClave'];

			$arrData = $this->model->selectIdiomass($search);
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function registrarempleoEmpresa()
	{
		$ruc = $_POST['ruc'];
		$email_user = $_POST['correo'];
		$telefono = $_POST['celular'];
		$nombreEmpresa = $_POST['nombreempresa'];

		$empresa = $this->model->getOne($ruc);

		$insert = '';
		$arrData = '';

		if ($empresa['idempresa'] > 0) {
			//	echo ($empresa['idempresa']);
			$idEmpresa = $empresa['idempresa'];
		} else {
			/*registro de empresa nueva*/

			$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
			$nombre = $_FILES['archivoSubido']['name'];

			$password = $ruc;

			$imagen = $ruc . $nombre;



			if (!file_exists('Assets/archivos/empresa/')) {
				mkdir('Assets/archivos/empresa/', 0777, true);
				if (file_exists('Assets/archivos/empresa/')) {
					if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/empresa/' . $imagen)) {
						$personaid = $this->model->register($email_user, $telefono, $imagen, $password);
						$insert = $this->model->registerEmpresa($nombreEmpresa, $ruc, $personaid);
					} else {
						echo "no se pudo guardar ";
					}
				}
			} else {
				if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/empresa/' . $imagen)) {
					$personaid = $this->model->register($email_user, $telefono, $imagen, $password);
					$insert = $this->model->registerEmpresa($nombreEmpresa, $ruc, $personaid);
				} else {
					//echo "no se pudo guardar";
				}
			}

			$idEmpresa = $insert;
		}

		$NombrePuesto = $_POST['NombrePuesto'];
		$TrabajoRemoto = $_POST['TrabajoRemoto'];
		$NumeroVacantes = $_POST['NumeroVacantes'];
		$LugarTrabajo = $_POST['LugarTrabajo'];
		$FechaInico = $_POST['FechaInico'];
		$FechaFin = $_POST['FechaFin'];
		$DescripcionPuesto = $_POST['DescripcionPuesto'];
		$Experiencias = $_POST['Experiencias'];
		$InformacionAdicional = $_POST['InformacionAdicional'];
		$TipoContrato = $_POST['TipoContrato'];
		$JornadaLaboral = $_POST['JornadaLaboral'];
		$HorasSemanales = $_POST['HorasSemanales'];
		$HorarioTrabajo = $_POST['HorarioTrabajo'];
		$RemuneracionBruta = $_POST['RemuneracionBruta'];

		$Contacto = $email_user;

		$carreras = array();
		$titulaciones = array();
		$idiomas = array();
		$competencias = array();
		$escuelas = array();
		$carreras = json_decode($_POST['carreras'], true);
		$titulaciones = json_decode($_POST['titulaciones'], true);
		$idiomas = json_decode($_POST['idiomas'], true);
		$competencias = json_decode($_POST['competencias'], true);

		if($idEmpresa>0){
			$arrData = $this->model->insertarEmpleo($idEmpresa, $NombrePuesto, $FechaInico, $FechaFin, $titulaciones, $carreras, $competencias, $idiomas, $DescripcionPuesto, $InformacionAdicional, $NumeroVacantes, $Experiencias, $TipoContrato, $HorasSemanales, $HorarioTrabajo, $RemuneracionBruta, $Contacto, $LugarTrabajo, $TrabajoRemoto, $JornadaLaboral);
		}

		$today = getdate();
		$hora = $today["hours"];
		if ($hora < 6) {
			$saludo = ("Buenos días");
		} elseif ($hora < 12) {
			$saludo = ("Buenos días");
		} elseif ($hora <= 18) {
			$saludo = ("Buenas Tardes");
		} else {
			$saludo = ("Buenas Noches");
		}

		for ($i = 0; $i < count($carreras); $i++) {
			$escuelas[$i] = $this->model->listaCarreras($carreras[$i]['carreras']);
		}

		$dataUsuario = array(
			'email' => $Contacto,
			'saludo' => $saludo,
			'escuelas' => $escuelas,
			'nombreEmpresa' => $nombreEmpresa,
			'NombrePuesto' => $NombrePuesto,
			'FechaInico' => $FechaInico,
			'FechaFin' => $FechaFin,
			'telefono' => $telefono,
			'asunto' => 'Publicación de Empleo',
		);

		if ($arrData > 0) {
			$arrResponse = sendMailPublicacionEmpleo($dataUsuario, 'email_cambioPassword');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}

		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function buscarruc()
	{
		$ruc = $_POST['ruc'];
		$idEmpresa = $this->model->getAllEmpresa($ruc);

		if ($idEmpresa > 0) {
			$arrData = array('status' => true, 'data' => $idEmpresa);
		} else {
			$arrData = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}

		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	}
}
