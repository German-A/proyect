<?php

class libroreclamaciones extends Controllers
{

	public function __construct()
	{
		parent::__construct();
	}
	
	public function libroreclamaciones()
	{


		$data['page_id'] = 1;
		$data['page_tag'] = "libroreclamaciones";
		$data['page_title'] = "Página principal";
		$data['page_name'] = "libroreclamaciones";
		$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
		$this->views->getView($this, "libroreclamaciones", $data);
	}

		//insertar y actualizar los Banners
		public function set()
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
	
					$cantidadBanner = $this->model->cantidadBanner();
					$cantidad = $cantidadBanner['cant'];
					$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
					$nombre = $_FILES['archivoSubido']['name'];
					$p5 = $cantidad . $nombre;
	
	
					if (!file_exists('Assets/archivos/Libroreclamacionesadmin/')) {
						mkdir('Assets/archivos/Libroreclamacionesadmin/', 0777, true);
						if (file_exists('Assets/archivos/Libroreclamacionesadmin/')) {
							if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/Libroreclamacionesadmin/' . $p5)) {
								$insert = $this->model->register($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11);
							} else {
								echo "no se pudo guardar ";
							}
						}
					} else {
						if (move_uploaded_file($ubicacionTemporal, 'Assets/archivos/Libroreclamacionesadmin/' . $p5)) {
							$insert = $this->model->register($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11);
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
