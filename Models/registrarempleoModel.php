<?php

class RegistrarempleoModel extends Mysql
{
	private $intIdUsuario;

	private $strNombre;
	private $strApellido;
	private $strTelefono;
	private $strEmail;
	private $strPassword;
	private $strToken;
	private $intTipoId;
	private $intStatus;
	private $intborrar = 0;

	private $strNomFiscal;
	private $strDirFiscal;

	private $idEmpresa;
	private $NombrePuesto;
	private $FechaInico;
	private $FechaFin;

	private $idTitulaciones;
	private $idEmpleos;	
	private $escuelaid;


	private $DescripcionPuesto;
	private $InformacionAdicional;	
	private $NumeroVacantes;
	private $Experiencias;
	private $TipoContrato;
	private $HorasSemanales;	
	private $HorarioTrabajo;
	private $RemuneracionBruta;	
	private $Contacto;

	private $estadoempleos;





	public function __construct()
	{
		parent::__construct();
	}


	public function selectUsuarios($idempresa)
	{

		$sql = "SELECT *
			from empleos em
			inner join empresa emp
			on em.empresaid = emp.idempresa
			inner join usuario u
			on u.idpersona=emp.personaid
			where u.idpersona = $idempresa";
		$request = $this->select_all($sql);
		return $request;
	}

	// public function selectIdiomas()
	// {
	// 	$sql = "SELECT idIdiomas,Idiomas from idiomas where status!=0";
	// 	$request = $this->select_all($sql);


	// 	foreach ($request as $user) {
	// 		$response[] = array(
	// 			"id" => $user['idtitulaciones'],
	// 			"text" => $user['nombreTitulaciones']
	// 		);
	// 	}



	// 	return $response;
	// }

	// public function selectCarreras()
	// {
	// 	$sql = "SELECT idEscuela,nombreEscuela from escuela where status!=0";
	// 	$request = $this->select_all($sql);

	// 	foreach ($request as $user) {
	// 		$response[] = array(
	// 			"id" => $user['idtitulaciones'],
	// 			"text" => $user['nombreTitulaciones']
	// 		);
	// 	}



	// 	return $response;
	// }


	// public function selectCompetencias()
	// {
	// 	$sql = "SELECT idCompetencias,nombreCompetencias from competencias where status!=0";
	// 	$request = $this->select_all($sql);


	// 	foreach ($request as $user) {
	// 		$response[] = array(
	// 			"id" => $user['idtitulaciones'],
	// 			"text" => $user['nombreTitulaciones']
	// 		);
	// 	}



	// 	return $response;
	// }


	public function selectTitulaciones()
	{
		$response=null;
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
		$response=null;
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
		$response=null;
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
		$response=null;
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

	







	public function insertarEmpleo($idEmpresa, $NombrePuesto, $FechaInico, $FechaFin, $titulaciones,$carreras,$competencias,$idiomas,$DescripcionPuesto,$InformacionAdicional,$NumeroVacantes,$Experiencias,$TipoContrato,$HorasSemanales,$HorarioTrabajo,$RemuneracionBruta,$Contacto,$LugarTrabajo,$TrabajoRemoto,$JornadaLaboral)
	{

		$this->idEmpresa = $idEmpresa;
		$this->NombrePuesto = $NombrePuesto;
		$this->FechaInico = $FechaInico;
		$this->FechaFin = $FechaFin;
		$this->carreras = $carreras;


		$this->DescripcionPuesto =$DescripcionPuesto;
		$this->InformacionAdicional =$InformacionAdicional;	
		$this->NumeroVacantes =$NumeroVacantes;
		$this->Experiencias =$Experiencias;
		$this->TipoContrato =$TipoContrato;
		$this->HorasSemanales =$HorasSemanales;	
		$this->HorarioTrabajo =$HorarioTrabajo;
		$this->RemuneracionBruta =$RemuneracionBruta;	
		$this->Contacto =$Contacto;

		$this->LugarTrabajo =$LugarTrabajo;
		$this->TrabajoRemoto =$TrabajoRemoto;	
		$this->JornadaLaboral =$JornadaLaboral;

		$this->estadoempleos =1;



	
	
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
		$this->idEmpleos = $request_insert ;

		
		//insertar en el detalle de titulaciones
		foreach ($titulaciones as $val) {
			$this->idTitulaciones = $val ;
			$query_insert  = "INSERT INTO detalletitulaciones(titulacionesid,empleosid)
					VALUES(?,?)";
			$arrData = array(
				$this->idTitulaciones,
				$this->idEmpleos
			);
			$request_in = $this->insert($query_insert, $arrData);
		}
		$return = $request_in;

		//insertar en el detalle de carreras
		foreach ($carreras as $val) {
			$this->escuelaid = $val ;
			$query_insert  = "INSERT INTO detallecarreras(escuelaid,empleosid)
					VALUES(?,?)";
			$arrData = array(
				$this->escuelaid,
				$this->idEmpleos
			);
			$request_in = $this->insert($query_insert, $arrData);
		}
		$return = $request_in;
		//insertar en el detalle de competencias
		foreach ($competencias as $val) {
			$this->competenciasid = $val ;
			$query_insert  = "INSERT INTO detallecompetencias(competenciasid,empleosid)
					VALUES(?,?)";
			$arrData = array(
				$this->competenciasid,
				$this->idEmpleos
			);
			$request_in = $this->insert($query_insert, $arrData);
		}
		$return = $request_in;
		//insertar en el detalle de idiomas
		foreach ($idiomas as $val) {
			$this->idiomaid = $val ;
			$query_insert  = "INSERT INTO detalleidiomas(idiomaid,empleosid)
					VALUES(?,?)";
			$arrData = array(
				$this->idiomaid,
				$this->idEmpleos
			);
			$request_in = $this->insert($query_insert, $arrData);
		}
		$return = $request_in;



		return $return;
	}
}
