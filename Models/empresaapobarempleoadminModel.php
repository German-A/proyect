<?php 

	class EmpresaapobarempleoadminModel extends Mysql
	{
		private $intIdUsuario;
		private $nombreArchivo;
		private $nuevonombre;
		private $cantidad;

		private $intValidarRuc=2;
		private $intAprobarEmpleo=3;
		private $intDifusionEmpleo=4;

		public function __construct()
		{
			parent::__construct();
		}

		public function listaEmpleos()
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

		public function aprobarEmpleo(int $IdBaner)
		{
			$this->intIdUsuario = $IdBaner;
			$sql = "UPDATE empleos SET status = ? WHERE idEmpleos = $this->intIdUsuario ";
			$arrData = array($this->intAprobarEmpleo);
			$request = $this->update($sql,$arrData);
			return $request;
		}

		public function listaCarrerasid($idempresa)
		{
			$sql = "SELECT dt.empleosid,u.nombres, u.email_user,e.nombreEscuela
			FROM detallecarreras dt
			inner join escuela e on dt.escuelaid = e.idEscuela
			inner join egresado eg on eg.idescuela = e.idEscuela
			inner join usuario u on u.idpersona = eg.personaid
			where empleosid = $idempresa";
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
			on u.idpersona=emp.personaid
			where em.status =2 and  em.idempleos = $idempleo";
			$request = $this->select($sql);			
			return $request;
		}

		public function listaEmpleosParaValidarRuc()
		{
			$sql = "SELECT em.idEmpleos,emp.ruc,emp.nombreEmpresa,emp.Direccion,u.idpersona,em.status,
			em.NombrePuesto,em.LugarTrabajo,em.Contacto,em.FechaInico,em.FechaFin
			from empleos em
			inner join empresa emp
			on em.empresaid = emp.idempresa
			inner join usuario u
			on u.idpersona=emp.personaid
			where em.status =1";
			$request = $this->select_all($sql);			
			return $request;
		}

		public function aprobarRucEmpleo(int $IdBaner)
		{
			$this->intIdUsuario = $IdBaner;
			$sql = "UPDATE empleos SET status = ? WHERE idEmpleos = $this->intIdUsuario ";
			$arrData = array($this->intValidarRuc);
			$request = $this->update($sql,$arrData);
			return $request;
		}
	}
 ?>