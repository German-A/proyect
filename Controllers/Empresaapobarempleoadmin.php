<?php

class empresaapobarempleoadmin extends Controllers
{
	public function __construct()
	{
		session_start();
		//session_regenerate_id(true);
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(12);
	}

	//PAGINA APROBAR EMPLEO
	public function empresaapobarempleoadmin()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}

		$data = [
			'page_tag' => 'Empleos-Admin',
			'page_title' => "Empleos <small>Unidad de Seguimiento del Egresado</small>",
			'page_name' => "USE-Empleos",
			'page_functions_js' => "functions_empresaapobarempleoadmin.js",
		];

		$this->views->getView($this, "empresaapobarempleoadmin", $data);
	}

	//LISTA DE EMPLEOS POR APROBAR
	public function get()
	{
		if ($_SESSION['permisos'][12]['r']) {
			$arrData = $this->model->listParaAprobar();

			foreach ($arrData as &$line) {

				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				//echo $line['idEmpleos'];

				$line['titulacionesid'] = "";
				$line['escuelaid'] = "";

				$arrTitulaciones = $this->model->listaTitulaciones($line['idEmpleos']);
				$arrCarreras = $this->model->listaCarreras($line['idEmpleos']);

				foreach ($arrTitulaciones as &$titulaciones) {
					$line['titulacionesid'] = 	$line['titulacionesid'] . '<h5><span class="badge badge-primary">' . $titulaciones['nombreTitulaciones'] . '</span></h5> ';
				}

				foreach ($arrCarreras as &$carreras) {
					$line['escuelaid'] = 	$line['escuelaid'] . '<h5><span class="badge badge-info">' . $carreras['nombreEscuela'] . '</span></h5> ';
				}

				if ($_SESSION['permisos'][12]['r']) {
				}

				
			
			

				if ($_SESSION['permisos'][12]['u']) {
					$btnDelete = '<button class="btn btn-success btn-sm btnDelUsuario" onClick="fntAprobarBanner(' . $line['idEmpleos'] . ')" title="Aprobar Empleo"><i class="fas fa-check-circle"></i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}
				


				$line['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}

			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//APROBACION DE EMPLEO
	public function aprobarEmpleo()
	{
		if ($_POST) {
			if ($_SESSION['permisos'][12]['w']) {
				$idempleo = intval($_POST['idempleo']);
				$request = $this->model->aprobarEmpleo($idempleo);

				$this->enviarCorreo($idempleo);
				//$this->enviarCorreoEgresado($idempleo);

				if ($request) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha publicado correctamente');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al publicar el Empleo.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	//CORREO A LA EMPRESA Y LA USE
	public function enviarCorreo($idempleo)
	{
		$arrData['nombres'] = "";
		$arrData['email_user'] = "";
		$arrData['NombrePuesto'] = "";
		$arrData['FechaFin'] = "";

		$arrData = $this->model->buscarPuestoPublicado($idempleo); //datos del usuario

		$arrData = $this->model->listaParaAprobarEmpleo($idempleo); //datos del usuario

		$dataUsuario = array(
			'nombreUsuario' => $arrData['nombreEmpresa'],
			'email_user' => $arrData['email_user'],
			'NombrePuesto' => $arrData['NombrePuesto'],
			'FechaFin' => $arrData['FechaFin'],
			'asunto' => 'Oferta Laboral '
		);
		sendAprobacionCorreo($dataUsuario, 'email_empleo');
	}


	//CORREO A LA USE DEL EGRESADO
	public function enviarCorreoEgresado($idempleo)
	{
		$arrDataCarreras = array();
		$arrDataCorreos = array();

		$arrData['nombres'] = "";
		$arrData['email_user'] = "";
		$arrData['NombrePuesto'] = "";
		$arrData['FechaFin'] = "";

		$arrDataCarreras = $this->model->buscarCarrerasEmpleo($idempleo); //datos del usuario

		$arrDataCorreos = $this->model->buscarCorreosEgresados($arrDataCarreras); //datos del usuario

		sendEmpleosEgresados($arrDataCorreos, 'email_empleo');
	}





	/**************************************** PAGINA DE EMPLEOS PARA VALIDAR RUC ****************************************/
	public function validarruc()
	{
		if ($_SESSION['permisos'][25]['r'] == 0) {
			header("Location:" . base_url() . '/dashboard');
		}

		$data = [
			'page_tag' => 'Empleos - Validar Ruc',
			'page_functions_js' => "functions_empresaapobarempleoadmin-ruc.js",
		];

		$this->views->getView($this, "validarruc", $data);
	}
	//LISTA DE EMPLEOS POR APROBAR
	public function getEmpleosRuc()
	{
		if ($_SESSION['permisos'][25]['r']) {
			$arrData = $this->model->listaEmpleosParaValidarRuc();

			foreach ($arrData as &$line) {

				$btnAprobar = '';
				$btnValidar = '';

				$line['titulacionesid'] = "";
				$line['escuelaid'] = "";

				if ($_SESSION['permisos'][25]['r']) {
					$btnValidar = '<button class="btn btn-primary" type="button" onclick="buscar(' . $line['ruc'] . ');"><i class="fas fa-plus-circle"></i>Validar Ruc</button>';
				}

				if ($_SESSION['permisos'][25]['r']) {
					$btnAprobar = '<button class="btn btn-success btn-sm btnDelUsuario" onClick="fntAprobarBanner(' . $line['idEmpleos'] . ')" title="Aprobar Empleo"><i class="fas fa-check-circle"> Confirmar Ruc</i></button>';
				} else {
					$btnAprobar = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}

				$line['options'] = '<div class="text-center">' . $btnAprobar . ' ' . $btnValidar . '</div>';
			}

			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	//VALIDAR EL RUC DE LA EMPRESA
	public function aprobarRucEmpleo()
	{
		if ($_POST) {
			if ($_SESSION['permisos'][25]['r']) {
				$idempleo = intval($_POST['idempleo']);
				$requestDelete = $this->model->aprobarRucEmpleo($idempleo);

				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha publicado correctamente');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al publicar el Empleo.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}


	/**************************************** PAGINA PARA DIFUSION EMPLEOS ****************************************/
	public function difusionempleos()
	{
		if ($_SESSION['permisos'][26]['r'] == 0) {
			header("Location:" . base_url() . '/dashboard');
		}

		$data = [
			'page_tag' => 'Empleos-Difusión',
			'page_functions_js' => "functions_empresaapobarempleoadmin-difusionempleo.js",
		];

		$this->views->getView($this, "difusionempleos", $data);
	}

	//LISTA DE EMPLEOS POR APROBAR
	public function getdifusionempleos()
	{
		if ($_SESSION['permisos'][26]['r']) {
			$arrData = $this->model->listaEmpleosDifusion();

			foreach ($arrData as &$line) {

				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				//echo $line['idEmpleos'];

				$line['titulacionesid'] = "";
				$line['escuelaid'] = "";

				$arrTitulaciones = $this->model->listaTitulaciones($line['idEmpleos']);
				$arrCarreras = $this->model->listaCarreras($line['idEmpleos']);

				foreach ($arrTitulaciones as &$titulaciones) {
					$line['titulacionesid'] = 	$line['titulacionesid'] . '<h5><span class="badge badge-primary">' . $titulaciones['nombreTitulaciones'] . '</span></h5> ';
				}

				foreach ($arrCarreras as &$carreras) {
					$line['escuelaid'] = 	$line['escuelaid'] . '<h5><span class="badge badge-info">' . $carreras['nombreEscuela'] . '</span></h5> ';
				}

				if ($_SESSION['permisos'][26]['u']) {
					$btnDelete = '<button class="btn btn-success btn-sm btnDelUsuario" onClick="fntdifusionempleos(' . $line['idEmpleos'] . ')" title="Aprobar Empleo"><i class="fas fa-check-circle"></i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}

				$line['imagen'] = '<a target="_blank" href="' . base_url() . '/Assets/archivos/empresa/'.$line['imagen'].'" >imagen</a>';

				$line['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}

			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//APROBACION DE EMPLEO
	public function aprobarEmpleodifusionempleos()
	{
		if ($_POST) {
			if ($_SESSION['permisos'][26]['r']) {
				$idempleo = intval($_POST['idempleo']);
				$requestDelete = $this->model->difusionCompletado($idempleo);




				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha publicado correctamente');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al publicar el Empleo.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	/**************************************** PAGINA PARA SEGUIMIENTO EMPLEO ****************************************/
	public function seguimientoempleo()
	{
		if ($_SESSION['permisos'][27]['r'] == 0) {
			header("Location:" . base_url() . '/dashboard');
		}

		$data = [
			'page_tag' => 'Empleos-Seguimiento',
			'page_functions_js' => "functions_empresaapobarempleoadmin-seguimientoempleo.js",
		];

		$this->views->getView($this, "seguimientoempleo", $data);
	}

	//LISTA DE EMPLEOS POR APROBAR
	public function getSeguimientoEmpleo()
	{
		if ($_SESSION['permisos'][27]['r']) {
			$arrData = $this->model->listaSeguimientoEmpleo();

			foreach ($arrData as &$line) {

				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				//echo $line['idEmpleos'];

				$line['titulacionesid'] = "";
				$line['escuelaid'] = "";

				$arrTitulaciones = $this->model->listaTitulaciones($line['idEmpleos']);
				$arrCarreras = $this->model->listaCarreras($line['idEmpleos']);

				foreach ($arrTitulaciones as &$titulaciones) {
					$line['titulacionesid'] = 	$line['titulacionesid'] . '<h5><span class="badge badge-primary">' . $titulaciones['nombreTitulaciones'] . '</span></h5> ';
				}

				foreach ($arrCarreras as &$carreras) {
					$line['escuelaid'] = 	$line['escuelaid'] . '<h5><span class="badge badge-info">' . $carreras['nombreEscuela'] . '</span></h5> ';
				}

				foreach ($arrData as &$estado) {

					if ($estado['status'] == 1) {
						$estado['status'] =  '<h5><span class="badge badge-pill badge-danger">Validación Ruc</span></h5> ';
					}
					if ($estado['status'] == 2) {
						$estado['status'] =  '<h5><span class="badge badge-pill badge-warning">Aprobación Empleo</span></h5> ';
					}
					if ($estado['status'] == 3) {
						$estado['status'] =  '<h5><span class="badge badge-pill badge-success">Difusión</span></h5> ';
					}
					if ($estado['status'] == 4) {
						$estado['status'] =  '<h5><span class="badge badge-pill badge-dark">Proceso Terminado</span></h5> ';
					}
				}

				if ($_SESSION['permisos'][26]['u']) {
					$btnDelete = '<button class="btn btn-success btn-sm btnDelUsuario" onClick="fntdifusionempleos(' . $line['idEmpleos'] . ')" title="Terminar Proceso"><i class="fas fa-check-circle"></i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}
				$line['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}

			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
