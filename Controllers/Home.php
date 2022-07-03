<?php

class Home extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}
	/*PAGINA DE INICIO*/
	public function home()
	{
		$data['page_id'] = 1;
		$data['page_tag'] = "Home";
		$data['page_title'] = "Página principal";
		$data['page_name'] = "home";
		$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
		$this->views->getView($this, "home", $data);
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


	//obtener un baner para actualizar
	public function getfacultadPerfiles($id)
	{
		if ($id > 0) {
			$arrData = $this->model->listaEscuelasPerfilesAcademicos($id);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//obtener un baner para actualizar
	public function getfacultadPerfilesAnios($id)
	{
		if ($id > 0) {
			$arrData = $this->model->listaEscuelasPerfilesAcademicosAnios($id);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//obtener un baner para actualizar
	public function cantidadvisitas()
	{

		$arrData = $this->model->cantidadvisitas();
		$idanios = $arrData['idanios'];
		$visitas = $arrData['cantidad'] + 1;

		$arrData = $this->model->updatevisitas($idanios, $visitas);
		$arrData = $this->model->cantidadvisitas();

		if (empty($arrData)) {
			$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
		} else {
			$arrResponse = array('status' => true, 'data' => $arrData);
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

		die();
	}


	public function crearTicket()
	{
		if (empty($_POST['email']) || empty($_POST['mensaje']) || empty($_POST['contacto'])) {
			$arrResponse = array(
				'status' => false,
				'msg' => 'Le faltan ingresar datos'
			);
		} else {

			$email = $_POST['email'];
			$mensaje = $_POST['mensaje'];
			$contacto = $_POST['contacto'];

			$dataUsuario = array(
				'email' => $email,
				'mensaje' => $mensaje,
				'contacto' => $contacto,
				'asunto' => 'Recuperar cuenta - ' . NOMBRE_REMITENTE
			);	

			if (sendMailTicketLocal($dataUsuario, 'email_cambioPassword')) {
				$arrResponse = array(
					'status' => true,
					'msg' => 'Tu mensaje a sido enviado con éxito, así mismo se enviara una copia en el correo que registraste.'
				);
			} else {
				$arrResponse = array(
					'status' => false,
					'msg' => 'No es posible realizar el proceso, intenta más tarde.'
				);
			}
		}

		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);



		die();
	}
}
