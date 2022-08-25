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
			'page_name' => "USE-banner",
			'page_functions_js' => "functions_empresaapobarempleoadmin.js",
		];

		$this->views->getView($this, "empresaapobarempleoadmin", $data);
	}

	//LISTA DE EMPLEOS POR APROBAR
	public function get()
	{
		if ($_SESSION['permisos'][12]['r']) {
			$arrData = $this->model->listaEmpleos();

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


			//echo "<pre>";
			//print_r($arrData) ;
			//echo "<pre>";



			// for ($i = 0; $i < count($arrData); $i++) {
			// 	$btnView = '';
			// 	$btnEdit = '';
			// 	$btnDelete = '';
			// 	$arrData[$i]['titulacionesid'] = "";
			// 	$arrData[$i]['escuelaid'] = "";

			// 	$arrD = $this->model->listaTitulaciones($arrData[$i]['idEmpleos']);
			// 	$arrDD = $this->model->listaCarreras($arrData[$i]['idEmpleos']);

			// 	for ($j = 0; $j < count($arrD); $j++) {
			// 		$arrData[$i]['titulacionesid'] = $arrData[$i]['titulacionesid'] . '<h5><span class="badge badge-primary">' . $arrD[$j]['nombreTitulaciones'] . '</span></h5> ';
			// 	}

			// 	for ($j = 0; $j < count($arrDD); $j++) {
			// 		$arrData[$i]['escuelaid'] = $arrData[$i]['escuelaid'] . '<h5><span class="badge badge-info">' . $arrDD[$j]['nombreEscuela'] . '</span></h5> ';
			// 	}


			// 	if ($_SESSION['permisosMod']['u']) {
			// 		if (( $_SESSION['userData']['idrol'] == 1) ||( $_SESSION['userData']['idrol'] == 2)) {
			// 				$btnDelete = '<button class="btn btn-success btn-sm btnDelUsuario" onClick="fntAprobarBanner(' . $arrData[$i]['idEmpleos'] . ')" title="Aprobar Empleo"><i class="fas fa-check-circle"></i></button>';
			// 		} else {
			// 			$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
			// 		}
			// 	}
			// 	$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			// }

			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//APROBACION DE EMPLEO
	public function aprobarEmpleo()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$idempleo = intval($_POST['idempleo']);
				$requestDelete = $this->model->aprobarEmpleo($idempleo);

				$this->enviarCorreo($idempleo);

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

	//CORREO A LA EMPRESA Y LA USE
	public function enviarCorreo($idempleo)
	{
		$nombreUsuario = null;
		$email_user = null;
		$NombrePuesto = null;
		$FechaFin = null;

		$arrData['nombres'] = "";
		$arrData['email_user'] = "";
		$arrData['NombrePuesto'] = "";
		$arrData['FechaFin'] = "";


		$arrData = $this->model->listaCarrerasid($idempleo); //datos del usuario
		for ($i = 0; $i <= count($arrData); $i++) {

			//$nombreUsuario = empty($arrData[$i]['nombres']);
			if (!empty($arrData[$i]['nombres'])) {
				$nombreUsuario = $arrData[$i]['nombres'];
			}
			if (!empty($arrData[$i]['email_user'])) {
				$email_user = $arrData[$i]['email_user'];
			}
			if (!empty($arrData[$i]['NombrePuesto'])) {
				$NombrePuesto = $arrData[$i]['NombrePuesto'];
			}
			if (!empty($arrData[$i]['FechaFin'])) {
				$FechaFin = $arrData[$i]['FechaFin'];
			}


			$dataUsuario = array(
				'nombreUsuario' => $nombreUsuario,
				'email_user' => $email_user,
				'NombrePuesto' => $NombrePuesto,
				'FechaFin' => $FechaFin,
				'asunto' => 'Recuperar cuenta - ' . NOMBRE_REMITENTE
			);
			sendAprobacionCorreo($dataUsuario, 'email_empleo');
			$dataUsuario = null;
		}
	}

	/*PAGINA PARA SECRETARIADO*/

	//PAGINA APROBAR EMPLEO
	public function validarruc()
	{
		if (empty($_SESSION['permisos'][25]['r'])){
			header("Location:" . base_url() . '/dashboard');
		}

		$data = [
			'page_tag' => 'Empleos-Admin',
			'page_title' => "Empleos <small>Unidad de Seguimiento del Egresado</small>",
			'page_name' => "USE-banner",
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

				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				$btnValidar = '';

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

				if ($_SESSION['permisos'][25]['r']) {
					$btnValidar = '<button class="btn btn-primary" type="button" onclick="buscar(' . $line['ruc'] . ');"><i class="fas fa-plus-circle"></i>Validar Ruc</button>';
				}

				if ($_SESSION['permisos'][25]['r']) {
					$btnDelete = '<button class="btn btn-success btn-sm btnDelUsuario" onClick="fntAprobarBanner(' . $line['idEmpleos'] . ')" title="Aprobar Empleo"><i class="fas fa-check-circle"> Confirmar Ruc</i></button>';
				} else {
					$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
				}
				$line['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . ' ' . $btnValidar . '</div>';
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



	/*PAGINA PARA MARKETING*/

	//PAGINA APROBAR EMPLEO
	public function difusionempleos()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}

		$data = [
			'page_tag' => 'Empleos-Admin',
			'page_title' => "Empleos <small>Unidad de Seguimiento del Egresado</small>",
			'page_name' => "USE-banner",
			'page_functions_js' => "functions_empresaapobarempleoadmin-marketing.js",
		];

		$this->views->getView($this, "difusionempleos", $data);
	}

	//LISTA DE EMPLEOS POR APROBAR
	public function getdifusionempleos()
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->listaEmpleos();

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

				if ($_SESSION['permisos'][11]['r']) {
				}

				if ($_SESSION['permisosMod']['u']) {
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
	public function aprobarEmpleodifusionempleos()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$idempleo = intval($_POST['idempleo']);
				$requestDelete = $this->model->aprobarEmpleo($idempleo);

		
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
}
