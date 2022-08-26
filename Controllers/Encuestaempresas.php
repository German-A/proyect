<?php

class encuestaempresas extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function encuestaempresas()
	{
		$data['page_id'] = 4;
		$data['page_tag'] = "Estadisticas";
		$data['page_title'] = "Página principal";
		$data['page_name'] = "estadisticas";
		$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
		$this->views->getView($this, "encuestaempresas", $data);
	}

	public function perfilesacademicos()
	{
		$data['page_id'] = 4;
		$data['page_tag'] = "Estadisticas";
		$data['page_title'] = "Página principal";
		$data['page_name'] = "estadisticas";
		$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
		$this->views->getView($this, "perfilesacademicos", $data);
	}


	//insertar y actualizar los Banners
	public function set()
	{
		if ($_POST) {
			if (empty($_POST['pregunta1'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos en la Encuesta.');
			} else {
				$pregunta1 = intval($_POST['pregunta1']);
				$pregunta2 = intval($_POST['pregunta2']);
				$pregunta3 = intval($_POST['pregunta3']);
				$pregunta4 = intval($_POST['pregunta4']);
				$pregunta5 = intval($_POST['pregunta5']);
				
				$pregunta6 = intval($_POST['pregunta6']);
				$pregunta7 = intval($_POST['pregunta7']);
				$pregunta8 = $_POST['pregunta8'];
				$pregunta9 = intval($_POST['pregunta9']);
				$pregunta10 = intval($_POST['pregunta10']);

				$insert = $this->model->register($pregunta1, $pregunta2, $pregunta3,$pregunta4,$pregunta5,$pregunta6,
				$pregunta7,$pregunta8,$pregunta9,$pregunta10);	

				if ($insert > 0) {
					$arrResponse = array('status' => true, 'msg' => 'La Encuesta fue llenada con éxito!.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos de la Encuesta.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

}
