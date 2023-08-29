<?php

class EmpresaapobarempleoadminModel extends Mysql
{
	private $intIdUsuario;
	private $nombreArchivo;
	private $nuevonombre;
	private $cantidad;

	private $intValidarRuc = 2;
	private $intAprobarEmpleo = 3;
	private $intDifusionEmpleo = 4;

	public function __construct()
	{
		parent::__construct();
	}

	// LISTA DE EMPLEOS POR APROBAR
	public function listParaAprobar()
	{
		$sql = "SELECT u.idpersona,em.idEmpleos,em.status,emp.nombreEmpresa,
			em.NombrePuesto,em.DescripcionPuesto,em.InformacionAdicional,em.LugarTrabajo,em.TrabajoRemoto,em.NumeroVacantes,em.Experiencias,
			em.TipoContrato,em.JornadaLaboral,em.HorasSemanales,em.HorarioTrabajo,em.RemuneracionBruta,em.Contacto,em.FechaInico,em.FechaFin
			from empleos em
			inner join empresa emp
			on em.empresaid = emp.idempresa
			inner join usuario u
			on u.idpersona=emp.personaid
			where em.status =2";
		$request = $this->select_all($sql);
		return $request;
	}

	public function listaTitulaciones($idempresa)
	{
		$sql = "SELECT nombreTitulaciones
			FROM detalletitulaciones dt
			inner join titulaciones t
			on dt.titulacionesid = t.idTitulaciones
			where empleosid = $idempresa";
		$request = $this->select_all($sql);
		return $request;
	}

	public function listaCarreras($idempresa)
	{
		$sql = "SELECT nombreEscuela
			FROM detallecarreras dt
			inner join escuela e
			on dt.escuelaid = e.idEscuela
			where empleosid = $idempresa";
		$request = $this->select_all($sql);
		return $request;
	}

	// APROBACION DE EMPLEO
	public function aprobarEmpleo(int $idempleo)
	{
		$this->idempleo = $idempleo;
		$sql = "UPDATE empleos SET status = ? WHERE idEmpleos = $this->idempleo ";
		$arrData = array($this->intAprobarEmpleo);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	// BUSCAR DATOS DEL PUESTO DE LA EMPRESA PARA ENVIAR POR CORREO 
	public function buscarPuestoPublicado($idempresa)
	{
		$sql = "SELECT idEscuela, nombreEscuela
		FROM detallecarreras dt
		inner join escuela e
		on dt.escuelaid = e.idEscuela
		where empleosid  =  $idempresa";
		$request = $this->select_all($sql);
		return $request;
	}

	public function listaParaAprobarEmpleo($idempleo)
	{
		$sql = "SELECT em.idEmpleos,emp.nombreEmpresa, u.email_user,em.FechaFin,em.NombrePuesto
		from empleos em
		inner join empresa emp
		on em.empresaid = emp.idempresa
		inner join usuario u
		on u.idpersona = emp.personaid
		where  em.idEmpleos = $idempleo";
		$request = $this->select($sql);			
		return $request;
	}

	// BUSCAR DATOS DEL PUESTO DE LA EMPRESA PARA ENVIAR POR CORREO A LOS EGRESADOS
	public function buscarCarrerasEmpleo($idempresa)
	{
		$sql = "SELECT idEscuela
		FROM detallecarreras dt
		inner join escuela e
		on dt.escuelaid = e.idEscuela
		where empleosid = $idempresa";
		$request = $this->select_all($sql);
		return $request;
	}

	public function buscarCorreosEgresados($arrData)
	{

		$where = "eg.status != 0 and ";

		foreach ($arrData as $idcarrera)
		{			
			$where = $where . 'eg.idescuela = ' . $idcarrera['idEscuela'].' or ';
		}
		$where = substr($where, 0,-4);
		


		$sql = "SELECT email_user
		FROM egresado eg
		inner join escuela es on eg.idescuela = es.idEscuela
		inner join usuario u on u.idpersona = eg.personaid
		where $where";
		$request = $this->select_all($sql);
		return $request;
	}






	/*PAGINA PARA SECRETARIADO*/
	public function listaEmpleosParaValidarRuc()
	{
		$sql = "SELECT em.idEmpleos,emp.ruc,emp.nombreEmpresa,emp.Direccion,u.idpersona,
			em.status,em.NombrePuesto,em.LugarTrabajo,em.Contacto,em.FechaInico,em.FechaFin
			from empleos em
			inner join empresa emp
			on em.empresaid = emp.idempresa
			inner join usuario u
			on u.idpersona=emp.personaid
			where em.status =1";
		$request = $this->select_all($sql);
		return $request;
	}

	public function aprobarRucEmpleo(int $idempleo)
	{
		$this->idempleo = $idempleo;
		$sql = "UPDATE empleos SET status = ? WHERE idEmpleos = $this->idempleo ";
		$arrData = array($this->intValidarRuc);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	/*PAGINA PARA SECRETARIADO*/
	public function listaEmpleosDifusion()
	{
		$sql = "SELECT u.idpersona,em.idEmpleos,em.status,emp.nombreEmpresa,
		em.NombrePuesto,em.DescripcionPuesto,em.InformacionAdicional,em.LugarTrabajo,em.TrabajoRemoto,em.NumeroVacantes,em.Experiencias,
		em.TipoContrato,em.JornadaLaboral,em.HorasSemanales,em.HorarioTrabajo,em.RemuneracionBruta,em.Contacto,em.FechaInico,em.FechaFin
		from empleos em
		inner join empresa emp
		on em.empresaid = emp.idempresa
		inner join usuario u
		on u.idpersona=emp.personaid
		where em.status =3";
		$request = $this->select_all($sql);
		return $request;
	}

	// DIFUCION COMPLETADA
	public function difusionCompletado(int $idempleo)
	{
		$this->idempleo = $idempleo;
		$sql = "UPDATE empleos SET status = ? WHERE idEmpleos = $this->idempleo ";
		$arrData = array($this->intDifusionEmpleo);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	/*PAGINA PARA SECRETARIADO*/
	public function listaSeguimientoEmpleo()
	{
		$sql = "SELECT u.idpersona,em.idEmpleos,em.status,emp.nombreEmpresa,
			em.NombrePuesto,em.DescripcionPuesto,em.InformacionAdicional,em.LugarTrabajo,em.TrabajoRemoto,em.NumeroVacantes,em.Experiencias,
			em.TipoContrato,em.JornadaLaboral,em.HorasSemanales,em.HorarioTrabajo,em.RemuneracionBruta,em.Contacto,em.FechaInico,em.FechaFin
			from empleos em
			inner join empresa emp
			on em.empresaid = emp.idempresa
			inner join usuario u
			on u.idpersona=emp.personaid
			where em.status >0";
		$request = $this->select_all($sql);
		return $request;
	}
}
