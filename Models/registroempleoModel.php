<?php 

	class RegistroempleoModel extends Mysql
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
		private $intborrar=0;
	
		private $strNomFiscal;
		private $strDirFiscal;

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
				
						where u.idpersona =$idempresa
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
			return $request;
		}


	

	
	}
 ?>