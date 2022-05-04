<?php



class registroempleo extends Controllers
{
	public function __construct()
	{
		session_start();
		parent::__construct();

		session_regenerate_id(true);
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(15);
	}


	public function registroempleo()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Expoferia";
		$data['page_title'] = "Lista de Empleos <small>Expoferia</small>";
		$data['page_name'] = "usuarios";
		$data['idUser'] = $_SESSION['userData']['idpersona'];
		$data['page_functions_js'] = "functions_registroEmpleo.js";
		$this->views->getView($this, "registroempleo", $data);
	}

	public function getEmpresas()
	{
		$idempresa = $_SESSION['userData']['idpersona'];

		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->listaEmpleos($idempresa);
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
					$arrData[$i]['escuelaid'] = $arrData[$i]['escuelaid'] . '<h5><span class="badge badge-info">' . $arrDD[$j]['nombreEscuela'] . '</span></h5> ';
					//$arrData[$i]['titulacionesid']=$arrData[$i]['titulacionesid']. $arrD[$j]['nombreTitulaciones'];
				}
					//echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
				;

				// if ($arrData[$i]['status'] == 1) {
				// 	$arrData[$i]['status'] = '<span class="badge badge-warning">En Proceso</span>';
				// } else {
				// 	$arrData[$i]['status'] = '<span class="badge badge-success">Aprobado</span>';
				// }

				if ($arrData[$i]['status'] == 0) {
					$arrData[$i]['status'] = '<span class="badge badge-secondary">Cancelado</span>';
				} elseif ($arrData[$i]['status'] == 1) {
					$arrData[$i]['status'] = '<span class="badge badge-warning">En Proceso</span>';
				} else {
					$arrData[$i]['status'] = '<span class="badge badge-success">Publicado</span>';
				}
				

				// if ($_SESSION['permisosMod']['r']) {
				// 	$btnView = '<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewUsuario(' . $arrData[$i]['idEmpleos'] . ')" title="Ver usuario"><i class="far fa-eye"></i></button>';
				// }
				// if ($_SESSION['permisosMod']['u']) {
				// 	if ($_SESSION['userData']['idrol'] == 4) {
				// 		$btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditUsuario(this,' . $arrData[$i]['idEmpleos'] . ')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>';
				// 	} else {
				// 		$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
				// 	}
				// }

				if ($_SESSION['permisosMod']['d']) {
					if ($_SESSION['userData']['idrol'] == 4) {
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelBanner(' . $arrData[$i]['idEmpleos'] . ')" title="Cancelar Empleo"><i class="far fa-trash-alt"></i></button>';
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
	public function delBanner()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$IdBaner = intval($_POST['IdBaner']);
				$requestDelete = $this->model->deleteBanner($IdBaner);
				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha cancelado el Empleo');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al cancelar el Empleo.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}
}
