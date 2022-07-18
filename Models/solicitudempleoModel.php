<?php

class SolicitudempleoModel extends Mysql
{
	private $intIdUsuario;
	private $nombreArchivo;
	private $nuevonombre;
	private $cantidad;
	private $intborrar = 0;
	private $request_in = 0;




	public function __construct()
	{
		parent::__construct();
	}


	public function selectTitulaciones()
	{
		$response = null;
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0 ";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idTitulaciones'],
				"text" => $user['nombreTitulaciones']
			);
		}

		return $response;
	}
	public function selectTitulacioness($search)
	{
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0 and nombreTitulaciones LIKE '%$search%' ORDER BY nombreTitulaciones";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idTitulaciones'],
				"text" => $user['nombreTitulaciones']
			);
		}
		return $response;
	}

	public function selectCarreras()
	{
		$response = null;
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idEscuela,nombreEscuela from escuela where status!=0";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idEscuela'],
				"text" => $user['nombreEscuela']
			);
		}

		return $response;
	}
	public function selectCarrerass($search)
	{
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idEscuela,nombreEscuela from escuela where status!=0 and nombreEscuela LIKE '%$search%' ORDER BY nombreEscuela";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idEscuela'],
				"text" => $user['nombreEscuela']
			);
		}
		return $response;
	}

	public function selectCompetencias()
	{
		$response = null;
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idCompetencias,nombreCompetencias from competencias where status!=0";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idCompetencias'],
				"text" => $user['nombreCompetencias']
			);
		}

		return $response;
	}
	public function selectCompetenciass($search)
	{
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idCompetencias,nombreCompetencias from competencias where status!=0 and nombreCompetencias LIKE '%$search%' ORDER BY nombreCompetencias";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idCompetencias'],
				"text" => $user['nombreCompetencias']
			);
		}
		return $response;
	}


	public function selectIdiomas()
	{
		$response = null;
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idIdiomas,Idiomas from idiomas where status!=0";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idIdiomas'],
				"text" => $user['Idiomas']
			);
		}

		return $response;
	}
	public function selectIdiomass($search)
	{
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idIdiomas,Idiomas from idiomas where status!=0 and Idiomas LIKE '%$search%' ORDER BY Idiomas";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idIdiomas'],
				"text" => $user['Idiomas']
			);
		}
		return $response;
	}

	public function register($email_user, $telefono, $imagen, $password)
	{

		$this->email_user = $email_user;
		$this->rolid = 4;
		$this->telefono = $telefono;
		$this->imagen = $imagen;
		$this->password = $password;
		$return = 0;
		$query_insert  = "INSERT INTO usuario( email_user,rolid, telefono,password,imagen)
								  VALUES(?,?,?,?,?)";
		$arrData = array(
			$this->email_user,
			$this->rolid,
			$this->telefono,
			$this->password,
			$this->imagen
		);
		$this->request_insert = $this->insert($query_insert, $arrData);
		$return =$this->request_insert;
		return $return;
	}

	public function registerEmpresa($nombreEmpresa, $ruc, $personaid)
	{
		$this->nombreEmpresa = $nombreEmpresa;
		$this->ruc = $ruc;
		$this->personaid = $personaid;
		$return = 0;
		$query_insert  = "INSERT INTO empresa(nombreEmpresa,ruc,personaid)
								  VALUES(?,?,?)";
		$arrData = array(
			$this->nombreEmpresa,
			$this->ruc,
			$this->personaid
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;
		return $return;
	}


	public function listaCarreras($idempresa)
	{
		$sql = "SELECT nombreEscuela
				FROM escuela
				where status = 1 and idEscuela = $idempresa";
		$request = $this->select($sql);
		return $request;
	}






	public function insertarEmpleo($idEmpresa, $NombrePuesto, $FechaInico, $FechaFin, $titulaciones, $carreras, $competencias, $idiomas, $DescripcionPuesto, $InformacionAdicional, $NumeroVacantes, $Experiencias, $TipoContrato, $HorasSemanales, $HorarioTrabajo, $RemuneracionBruta, $Contacto, $LugarTrabajo, $TrabajoRemoto, $JornadaLaboral)
	{

		$this->idEmpresa = $idEmpresa;
		$this->NombrePuesto = $NombrePuesto;
		$this->FechaInico = $FechaInico;
		$this->FechaFin = $FechaFin;
		$this->carreras = $carreras;


		$this->DescripcionPuesto = $DescripcionPuesto;
		$this->InformacionAdicional = $InformacionAdicional;
		$this->NumeroVacantes = $NumeroVacantes;
		$this->Experiencias = $Experiencias;
		$this->TipoContrato = $TipoContrato;
		$this->HorasSemanales = $HorasSemanales;
		$this->HorarioTrabajo = $HorarioTrabajo;
		$this->RemuneracionBruta = $RemuneracionBruta;
		$this->Contacto = $Contacto;

		$this->LugarTrabajo = $LugarTrabajo;
		$this->TrabajoRemoto = $TrabajoRemoto;
		$this->JornadaLaboral = $JornadaLaboral;

		$this->estadoempleos = 1;





		$return = 0;
		$query_insert  = "INSERT INTO empleos(NombrePuesto,empresaid,
			FechaInico,FechaFin,DescripcionPuesto,InformacionAdicional,NumeroVacantes,Experiencias,TipoContrato,HorasSemanales,
			HorarioTrabajo,RemuneracionBruta,Contacto,LugarTrabajo,TrabajoRemoto,JornadaLaboral,estadoempleos) 
			VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$arrData = array(
			$this->NombrePuesto,
			$this->idEmpresa,
			$this->FechaInico,
			$this->FechaFin,
			$this->DescripcionPuesto,
			$this->InformacionAdicional,
			$this->NumeroVacantes,
			$this->Experiencias,
			$this->TipoContrato,
			$this->HorasSemanales,
			$this->HorarioTrabajo,
			$this->RemuneracionBruta,
			$this->Contacto,
			$this->LugarTrabajo,
			$this->TrabajoRemoto,
			$this->JornadaLaboral,
			$this->estadoempleos
		);

		$request_insert = $this->insert($query_insert, $arrData);
		$this->idEmpleos = $request_insert;


		//insertar en el detalle de titulaciones
		foreach ($titulaciones as $val) {
			$this->idTitulaciones = $val['titulaciones'];
			$query_insert  = "INSERT INTO detalletitulaciones(titulacionesid,empleosid)
						VALUES(?,?)";
			$arrData = array(
				$this->idTitulaciones,
				$this->idEmpleos
			);
			$this->request_in = $this->insert($query_insert, $arrData);
		}
		$return = $this->request_in;


		//insertar en el detalle de carreras
		foreach ($carreras as $val) {
			$this->escuelaid = $val['carreras'];
			$query_insert  = "INSERT INTO detallecarreras(escuelaid,empleosid)
						VALUES(?,?)";
			$arrData = array(
				$this->escuelaid,
				$this->idEmpleos
			);
			$this->request_in = $this->insert($query_insert, $arrData);
		}
		$return = $this->request_in;
		//insertar en el detalle de competencias
		foreach ($competencias as $val) {
			$this->competenciasid = $val['competencias'];
			$query_insert  = "INSERT INTO detallecompetencias(competenciasid,empleosid)
						VALUES(?,?)";
			$arrData = array(
				$this->competenciasid,
				$this->idEmpleos
			);
			$this->request_in = $this->insert($query_insert, $arrData);
		}
		$return = $this->request_in;
		//insertar en el detalle de idiomas
		foreach ($idiomas as $val) {
			$this->idiomaid = $val['idiomas'];
			$query_insert  = "INSERT INTO detalleidiomas(idiomaid,empleosid)
						VALUES(?,?)";
			$arrData = array(
				$this->idiomaid,
				$this->idEmpleos
			);
			$this->request_in = $this->insert($query_insert, $arrData);
		}
		$return = $this->request_in;



		return $return;
	}

	//obtener ruc
	public function getOne($ruc)
	{
		$sql = "SELECT ruc,idempresa
            FROM empresa
            where status=1 and ruc=$ruc
			";
		$request = $this->select($sql);
		return $request;
	}

	//obtener ruc
	public function getAllEmpresa($ruc)
	{
		$sql = "SELECT u.imagen, u.telefono,u.email_user,emp.nombreEmpresa
				FROM empresa emp
				inner join usuario u on emp.personaid = u.idpersona
				where u.status=1 and ruc=$ruc
				";
		$request = $this->select($sql);
		return $request;
	}
}
