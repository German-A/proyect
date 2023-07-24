<?php

class home extends Controllers
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
		$data['page_functions_js'] = "functions_home.js";
		$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
		$this->views->getView($this, "home", $data);
	}



	//obtener un baner para actualizar
	public function selectBannerFind()
	{

		$arrData = $this->model->selectBannerFind();
		if (empty($arrData)) {
			$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
		} else {
			$arrResponse = array('status' => true, 'data' => $arrData);
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);


		die();
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



	//obtener un baner para actualizar
	public function getObjetivosEducacionales($id)
	{
		if ($id > 0) {
			$arrData = $this->model->listaEscuelasObjetivosEducacionales($id);
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
	public function getObjetivosEducacionalesAnios($id)
	{
		if ($id > 0) {
			$arrData = $this->model->listaEscuelasObjetivosEducacionalesAnios($id);
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
	public function getPreguntasObjetivosEducacionales($id)
	{
		if ($id > 0) {
			$arrData = $this->model->listaPreguntasEscuelasObjetivosEducacionales($id);
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
	public function getPreguntasObjetivosEducacionalesAnios($id)
	{
		if ($id > 0) {
			$arrData = $this->model->listaPreguntasEscuelasObjetivosEducacionalesAnios($id);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	/*libro de reclamaciones*/

	//insertar y actualizar los Banners
	public function setLibroReclamaciones()
	{
		if ($_POST) {
			if (empty($_POST['p1'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en el Banner.');
			} else {

				$p1 = trim($_POST['p1']);
				$p2 = trim($_POST['p2']);
				$p3 = trim($_POST['p3']);
				$p4 = trim($_POST['p4']);
				$p6 = trim($_POST['p6']);
				$p7 = trim($_POST['p7']);
				$p8 = trim($_POST['p8']);
				$p9 = trim($_POST['p9']);
				$p10 = trim($_POST['p10']);
				$p11 = trim($_POST['p11']);

				$cantidadBanner = $this->model->cantidadlibroreclamaciones();
				$cantidad = $cantidadBanner['cant'];
				$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
				$nombre = $_FILES['archivoSubido']['name'];
				$p5 = $cantidad . $nombre;


				if (!file_exists('Assets/archivos/Libroreclamacionesadmin/')) {
					mkdir('Assets/archivos/Libroreclamacionesadmin/', 0777, true);
					if (file_exists('Assets/archivos/Libroreclamacionesadmin/')) {
						if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/Libroreclamacionesadmin/' . $p5)) {
							$insert = $this->model->registerlibroreclamaciones($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11);
						} else {
							echo "no se pudo guardar ";
						}
					}
				} else {
					if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/Libroreclamacionesadmin/' . $p5)) {
						$insert = $this->model->registerlibroreclamaciones($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11);
					} else {
						echo "no se pudo guardar";
					}
				}

				if ($insert > 0) {
					$arrResponse = array('status' => true, 'msg' => 'Su reclamo pronto será atendido.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
