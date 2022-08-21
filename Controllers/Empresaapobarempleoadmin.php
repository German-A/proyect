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
	//pagina Banner
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
	//listado de los banners
	public function get()
	{		
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->listaEmpleos();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				$arrData[$i]['titulacionesid'] = "";

				$arrData[$i]['escuelaid'] = "";

				$arrD = $this->model->listaTitulaciones($arrData[$i]['idEmpleos']);

				$arrDD = $this->model->listaCarreras($arrData[$i]['idEmpleos']);

				for ($j = 0; $j < count($arrD); $j++) {
					$arrData[$i]['titulacionesid'] = $arrData[$i]['titulacionesid'] . '<h5><span class="badge badge-primary">' . $arrD[$j]['nombreTitulaciones'] . '</span></h5> ';
				}

				for ($j = 0; $j < count($arrDD); $j++) {
					$arrData[$i]['escuelaid'] = $arrData[$i]['escuelaid'] . '<h5><span class="badge badge-info">' . $arrDD[$j]['nombreEscuela'] . '</span></h5> ';
				}


				if ($_SESSION['permisosMod']['u']) {
					if (( $_SESSION['userData']['idrol'] == 1) ||( $_SESSION['userData']['idrol'] == 2)) {
							$btnDelete = '<button class="btn btn-success btn-sm btnDelUsuario" onClick="fntAprobarBanner(' . $arrData[$i]['idEmpleos'] . ')" title="Aprobar Empleo"><i class="fas fa-check-circle"></i></button>';
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



	//borrar un banner
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

	public function enviarCorreo($idempleo){
		$nombreUsuario=null;
		$email=null;

		$arrData['nombres'] = "";
		$arrData['email_user'] = "";
		
		$arrData = $this->model->listaCarrerasid($idempleo); //datos del usuario
		for( $i=0; $i <= count($arrData); $i++){		

			//$nombreUsuario = empty($arrData[$i]['nombres']);
			if(!empty($arrData[$i]['nombres'])){$nombreUsuario = $arrData[$i]['nombres'];}
			if(!empty($arrData[$i]['email_user'])){$email = $arrData[$i]['email_user'];}
			
			$dataUsuario = array(
			'nombreUsuario' => $nombreUsuario,
			'email' => $email,
			'asunto' => 'Recuperar cuenta - '.NOMBRE_REMITENTE);
			sendMailLocalEmpleo($dataUsuario,'email_empleo');
			$dataUsuario=null;
		}
		
	
		
	}
	
}
