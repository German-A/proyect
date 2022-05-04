<?php 

	class EmpresaempleoadminModel extends Mysql
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

		public function listaEmpleos($idempresa)
		{
			$sql = "SELECT u.idpersona,em.idEmpleos, em.NombrePuesto,em.FechaInico,em.FechaFin,em.status
			from empleos em
						inner join empresa emp
						on em.empresaid = emp.idempresa
						inner join usuario u            
						on u.idpersona=emp.personaid				
						where em.status and emp.idempresa =$idempresa
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


		public function deleteBanner(int $IdBaner)
		{
			$this->intIdUsuario = $IdBaner;
			$sql = "UPDATE empleos SET status = ? WHERE idEmpleos = $this->intIdUsuario ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);

			$sql = "UPDATE detallecarreras SET status = ? WHERE empleosid = $this->intIdUsuario ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);

			$sql = "UPDATE detalletitulaciones SET status = ? WHERE empleosid = $this->intIdUsuario ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);

			$sql = "UPDATE detallecompetencias SET status = ? WHERE empleosid = $this->intIdUsuario ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);

			$sql = "UPDATE detalleidiomas SET status = ? WHERE empleosid = $this->intIdUsuario ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);



			return $request;
		}

	}
 ?>