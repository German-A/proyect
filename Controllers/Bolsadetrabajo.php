<?php

class bolsadetrabajo extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	/*PAGINA DE INICIO*/

	public function bolsadetrabajo()
	{
		$data['page_id'] = 4;
		$data['page_tag'] = "bolsadetrabajo";
		$data['page_title'] = "Página principal";
		$data['page_name'] = "home";
		$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
		$this->views->getView($this, "bolsadetrabajo", $data);
	}


	public function get_ofertas_laborales()
	{
		$line[]="";
		$line['id_difusion_ofertas'] = "";

		$carreras['nombreEscuela'] = "";


		$arrData = $this->model->get_ofertas_laborales();

		foreach ($arrData as &$line) {

			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';
		
			$line['nombreEscuela'] = "";
			$arrCarreras = $this->model->listaCarrerasRequeridas($line['id_difusion_ofertas']);

			foreach ($arrCarreras as &$carreras) {
				$line['nombreEscuela'] = $line['nombreEscuela'] . '&nbsp<label><span class="badge badge-info">' . $carreras['nombreEscuela'] . '</span></label>';
			}


			$line['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
		}

		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

		die();
	}









	//LISTA DE EMPLEOS POR APROBAR
	public function get()
	{

		$arrData = $this->model->listEmpleos();

		foreach ($arrData as &$line) {

			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';



			$line['titulacionesid'] = "";
			$line['nombreEscuela'] = "";

			$arrTitulaciones = $this->model->listaTitulaciones($line['idEmpleos']);
			$arrCarreras = $this->model->listaCarreras($line['idEmpleos']);

			foreach ($arrTitulaciones as &$titulaciones) {
				$line['titulacionesid'] = 	$line['titulacionesid'] . '<label><span class="badge badge-primary">' . $titulaciones['nombreTitulaciones'] . '</span></label> ';
			}

			foreach ($arrCarreras as &$carreras) {
				$line['nombreEscuela'] = 	$line['nombreEscuela'] . '<label><span class="badge badge-info">' . $carreras['nombreEscuela'] . '</span></label> ';
			}


			$line['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
		}

		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

		die();
	}

	//LISTA DE EMPLEOS POR APROBAR
	public function getOne($id)
	{

		$arrData = $this->model->oneEmpleo($id);

		foreach ($arrData as &$line) {

			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';



			$line['titulacionesid'] = "";
			$line['nombreEscuela'] = "";

			$arrTitulaciones = $this->model->listaTitulaciones($line['idEmpleos']);
			$arrCarreras = $this->model->listaCarreras($line['idEmpleos']);

			foreach ($arrTitulaciones as &$titulaciones) {
				$line['titulacionesid'] = 	$line['titulacionesid'] . '<label><span class="badge badge-primary">' . $titulaciones['nombreTitulaciones'] . '</span></label> ';
			}

			foreach ($arrCarreras as &$carreras) {
				$line['nombreEscuela'] = 	$line['nombreEscuela'] . '<label><span class="badge badge-info">' . $carreras['nombreEscuela'] . '</span></label> ';
			}


			$line['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
		}

		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

		die();
	}


	public function ofertas_laborales()
	{
		$data['page_id'] = 4;
		$data['page_tag'] = "ofertas_laborales";
		$data['page_title'] = "Página principal";
		$data['page_name'] = "home";
		$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
		$this->views->getView($this, "ofertas_laborales", $data);
	}
	public function desarrollo_personal()
	{
		$data['page_id'] = 4;
		$data['page_tag'] = "ofertas_laborales";
		$data['page_title'] = "Página principal";
		$data['page_name'] = "home";
		$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
		$this->views->getView($this, "desarrollo_personal", $data);
	}
}
