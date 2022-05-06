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
}
