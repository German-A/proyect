<?php 

	class bolsadetrabajoModel extends Mysql
	{
		private $intIdUsuario;
		private $nombreArchivo;
		private $nuevonombre;
		private $cantidad;
		private $intborrar=0;

		public function __construct()
		{
			parent::__construct();
		}

	// LISTA DE EMPLEOS POR APROBAR
	public function listEmpleos()
	{
		$sql = "SELECT u.imagen,u.idpersona,em.idEmpleos,em.status,emp.nombreEmpresa,
			em.NombrePuesto,em.DescripcionPuesto,em.InformacionAdicional,em.LugarTrabajo,em.TrabajoRemoto,em.NumeroVacantes,em.Experiencias,
			em.TipoContrato,em.JornadaLaboral,em.HorasSemanales,em.HorarioTrabajo,em.RemuneracionBruta,em.Contacto,em.FechaInico,em.FechaFin
			from empleos em
			inner join empresa emp
			on em.empresaid = emp.idempresa
			inner join usuario u
			on u.idpersona=emp.personaid			
			-- where em.status >2
			where em.status >0
			order by em.idEmpleos DESC
			";
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

	public function oneEmpleo($id)
	{
		$sql = "SELECT u.imagen,u.idpersona,em.idEmpleos,em.status,emp.nombreEmpresa,
			em.NombrePuesto,em.DescripcionPuesto,em.InformacionAdicional,em.LugarTrabajo,em.TrabajoRemoto,em.NumeroVacantes,em.Experiencias,
			em.TipoContrato,em.JornadaLaboral,em.HorasSemanales,em.HorarioTrabajo,em.RemuneracionBruta,em.Contacto,em.FechaInico,em.FechaFin,em.NombrePuesto
			from empleos em
			inner join empresa emp
			on em.empresaid = emp.idempresa
			inner join usuario u
			on u.idpersona=emp.personaid			
			-- where em.status >2
			where em.status >0 and em.idEmpleos = $id
			order by em.idEmpleos DESC
			";
		$request = $this->select_all($sql);
		return $request;
	}

		public function getOne($idusuario)
		{
			$sql = "SELECT * 
            FROM banner
            where Habilitado=1 and IdBaner=$idusuario
			";
			$request = $this->select($sql);			
			return $request;
		}
	}
 ?>