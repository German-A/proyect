<?php

class libroreclamacionesadmin extends Controllers
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
	public function libroreclamacionesadmin()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Libroreclamacionesadmin";
		$data['page_title'] = "Libroreclamacionesadmin <small>Unidad de Seguimiento del Egresado</small>";
		$data['page_name'] = "USE-Libroreclamacionesadmin";
		$data['page_functions_js'] = "functions_Libroreclamacionesadmin.js";
		$this->views->getView($this, "libroreclamacionesadmin", $data);
	}
	//listado de los banners
	public function get()
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->lista();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm fntView" onClick="fntView(' . $arrData[$i]['idlibroreclamaciones'] . ')" title="Ver Banner"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
						$btnEdit = '<button class="btn btn-primary  btn-sm fntEdit" onClick="fntEdit(this,' . $arrData[$i]['idlibroreclamaciones'] . ')" title="Editar Banner"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (($_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 2)) {
						$btnDelete = '<button class="btn btn-danger btn-sm fntDelete" onClick="fntDelete(' . $arrData[$i]['idlibroreclamaciones'] . ')" title="Eliminar Banner"><i class="far fa-trash-alt"></i></button>';
					} else {
						$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
					}
				}
				$arrData[$i]['p5'] = '<a href="' . base_url() . '/Assets/archivos/Libroreclamacionesadmin/' . $arrData[$i]['p5'] . '"target="_blank"><span class="badge badge-primary"  >' . $arrData[$i]['p5'] . '</span></a> ';

				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
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
