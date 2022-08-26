<?php

class encuestaempresasadmin extends Controllers
{
	public function __construct()
	{
		session_start();
		//session_regenerate_id(true);
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		//getPermisos(3);
	}
	//pagina Banner
	public function encuestaempresasadmin()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Encuesta Empresa";
		$data['page_title'] = "Encuesta Empresa <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-Encuesta Empresa";
		$data['page_functions_js'] = "functions_encuestaempresasadmin.js";
		$this->views->getView($this, "encuestaempresasadmin", $data);
	}
	//listado de los banners
	public function get()
	{
		$arrData = $this->model->lista();
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

	
		die();
	}

}
