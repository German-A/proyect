<?php



class registrarempleo extends Controllers
{
    public function __construct()
    {
		session_start();
        parent::__construct();
        
        //session_regenerate_id(true);
        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
        }
        getPermisos(14);    
    }


    public function getEmpresas()
	{
		$idempresa =$_SESSION['userData']['idpersona'];
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->selectUsuarios($idempresa);

			//$_SESSION['idempresa']=2;

			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';				

				if ($arrData[$i]['status'] == 1) {
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				} else {
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewUsuario(' . $arrData[$i]['idpersona'] . ')" title="Ver Empleos"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					if ( $_SESSION['userData']['idrol'] == 4) 
					{
						$btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditUsuario(this,' . $arrData[$i]['idpersona'] . ')" title="Editar Empleos"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
						($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1) and
						($_SESSION['userData']['idpersona'] != $arrData[$i]['idpersona'])
					) {
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario(' . $arrData[$i]['idpersona'] . ')" title="Eliminar Empleos"><i class="far fa-trash-alt"></i></button>';
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

	public function registrarempleo()
    {		
        if(empty($_SESSION['permisosMod']['r'])){
            header("Location:".base_url().'/dashboard');
        }
        $data['page_tag'] = "U.S.E.";
        $data['page_title'] = "Publicar Oferta Laboral";
        $data['page_name'] = "Publicar Oferta Laboral";
        //$data['idUser'] = $_SESSION['userData']['idpersona'];
		$data['idUser'] = $_SESSION['Empresario'];
        $data['page_functions_js'] = "functions_registrarempleo.js";
        $this->views->getView($this,"registrarempleo",$data);
    }

	//getTitulaciones
	public function getTitulaciones()
	{
		$search="";
	
		
		if ($_SESSION['permisosMod']['r']) {

			if(!isset($_POST['palabraClave'])){
				
				$arrData = $this->model->selectTitulaciones();
			}else{
				$search = $_POST['palabraClave'];
			
				$arrData = $this->model->selectTitulacioness($search);
				
			}		
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//getCarreras
	public function getCarreras()
	{
		$search="";
		
		if ($_SESSION['permisosMod']['r']) {

			if(!isset($_POST['palabraClave'])){
				
				$arrData = $this->model->selectCarreras();
			}else{
				$search = $_POST['palabraClave'];
			
				$arrData = $this->model->selectCarrerass($search);
				
			}		
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//getCompetencias
	public function getCompetencias()
	{
		$search="";
		
		if ($_SESSION['permisosMod']['r']) {

			if(!isset($_POST['palabraClave'])){
				
				$arrData = $this->model->selectCompetencias();
			}else{
				$search = $_POST['palabraClave'];
			
				$arrData = $this->model->selectCompetenciass($search);
				
			}		
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	//getIdiomas
	public function getIdiomas()
	{
		$search="";
		
		if ($_SESSION['permisosMod']['r']) {

			if(!isset($_POST['palabraClave'])){
				
				$arrData = $this->model->selectIdiomas();
			}else{
				$search = $_POST['palabraClave'];
			
				$arrData = $this->model->selectIdiomass($search);
				
			}		
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function registrarempleoEmpresa()	
	{

		$idEmpresa = $_POST['idEmpresa'];		
        $NombrePuesto = $_POST['NombrePuesto'];
		$FechaInico = $_POST['FechaInico'];
		$FechaFin = $_POST['FechaFin'];


		$DescripcionPuesto = $_POST['DescripcionPuesto'];		
        $InformacionAdicional = $_POST['InformacionAdicional'];
		$NumeroVacantes = $_POST['NumeroVacantes'];
		$Experiencias = $_POST['Experiencias'];
		$TipoContrato = $_POST['TipoContrato'];		
        $HorasSemanales = $_POST['HorasSemanales'];
		$HorarioTrabajo = $_POST['HorarioTrabajo'];
		$RemuneracionBruta = $_POST['RemuneracionBruta'];
		$Contacto = $_POST['Contacto'];

		$LugarTrabajo = $_POST['LugarTrabajo'];
		$TrabajoRemoto = $_POST['TrabajoRemoto'];
		$JornadaLaboral = $_POST['JornadaLaboral'];


		



		



		$titulaciones = [];
		$titulaciones = $_POST['titulaciones'];

		$carreras = [];
		$carreras = $_POST['carreras'];

		$competencias = [];
		$competencias = $_POST['competencias'];

		$idiomas = [];
		$idiomas = $_POST['idiomas'];
		


		
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->insertarEmpleo($idEmpresa,$NombrePuesto,$FechaInico,$FechaFin,$titulaciones,$carreras,$competencias,$idiomas,$DescripcionPuesto,$InformacionAdicional,$NumeroVacantes,$Experiencias,$TipoContrato,$HorasSemanales,$HorarioTrabajo,$RemuneracionBruta,$Contacto,$LugarTrabajo,$TrabajoRemoto,$JornadaLaboral);
		
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
    
}
