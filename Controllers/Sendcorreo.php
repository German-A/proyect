<?php

class sendcorreo extends Controllers
{
	public function __construct()
	{
		session_start();
		//session_regenerate_id(true);
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(3);
	}
	//pagina Banner
	public function sendcorreo()
	{
		$arrData = [];
		$arrData = $this->model->listaEscuelas();

		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Correo";
		$data['page_title'] = "Correo <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-Correo";
		$data['page_functions_js'] = "functions_sendcorreo.js";


		$data = [
			'page_tag' => 'Empleos-Admin',
			'page_title' => "Empleos <small>Unidad de Seguimiento del Egresado</small>",
			'page_name' => "USE-Empleos",
			'page_functions_js' => "functions_sendcorreo.js",
			'carreras' => $arrData 
		];

		$this->views->getView($this, "sendcorreo", $data);
	}



	public function enviarCorreo()
	{

	//	$arrData = $this->model->lista();

	
	//	$arrData = $this->model->listaCorreos($_POST['listaEscuelas']);

		$carreras= array();
		$carreras =json_decode($_POST['listaEscuelas'],true);

		$arrData = $this->model->listaCorreos($carreras);

		

		// foreach ($carreras as $email_user)
		//  {
		//  	echo $email_user['escuelas'];
		//  }

		

		sendMailLocalCarreras($_POST['descripcion'],$arrData);
	
		//echo $arrData;
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}
}
