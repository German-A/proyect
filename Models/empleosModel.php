<?php 

	class EmpleosModel extends Mysql
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

		public function listadoEmpleosAll($id)
		{
			$sql = "SELECT em.idEmpleos,em.status,emp.nombreEmpresa,u.imagen,
			em.NombrePuesto,em.DescripcionPuesto,em.InformacionAdicional,em.LugarTrabajo,em.TrabajoRemoto,em.NumeroVacantes,em.Experiencias,
			em.TipoContrato,em.JornadaLaboral,em.HorasSemanales,em.HorarioTrabajo,em.RemuneracionBruta,em.Contacto,em.FechaInico,em.FechaFin
			from empleos em
			inner join empresa emp on em.empresaid = emp.idempresa
			inner join usuario u on u.idpersona =emp.personaid
			inner join detallecarreras dt on dt.empleosid=em.idEmpleos
			inner join escuela e on e.idEscuela=dt.escuelaid
			where em.NombrePuesto LIKE '%$id%' or e.nombreEscuela LIKE '%$id%' or emp.nombreEmpresa LIKE '%$id%'
			group by em.idEmpleos";
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



		public function cantidadBanner()
		{
			$sql = "SELECT count(IdBaner) cant FROM banner where Habilitado = 1 order by FechaRegistro desc";
			$request = $this->select($sql);
			return $request;
		}

		public function insertBanner($nombreArchivo,$nuevonombre,$cantidad,$posicion){			
			$this->nombreArchivo = $nombreArchivo;
			$this->nuevonombre = $nuevonombre;
			$this->cantidad = $cantidad;
			$this->posicion = $posicion;
			$return = 0;
			$query_insert  = "INSERT INTO banner(Nombre,NombreArchivo,Posicion)
								  VALUES(?,?,?)";
	        	$arrData = array(
        						$this->nombreArchivo,
        						$this->nuevonombre,
        						$this->posicion);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
	        return $return;
		}

		public function updateBanner($nombreArchivo,$nuevonombre,$cantidad,$idUsuario,$posicion){
			$this->nombreArchivo = $nombreArchivo;
			$this->nuevonombre = $nuevonombre;
			$this->cantidad = $cantidad;
			$this->idUsuario = $idUsuario;
			$this->posicion = $posicion;
			$sql = "UPDATE banner SET Nombre=?, NombreArchivo=?, Posicion=?
			WHERE IdBaner = $this->idUsuario ";
					$arrData = array(
					$this->nombreArchivo,
					$this->nuevonombre,
					$this->posicion);
	
				$request = $this->update($sql,$arrData);
	        return $request;
		}

		public function updatePosicion($nombreArchivo,$idUsuario,$posicion){
			$this->nombreArchivo = $nombreArchivo;

			$this->idUsuario = $idUsuario;
			$this->posicion = $posicion;
			$sql = "UPDATE banner SET Nombre=?,Posicion=?
			WHERE IdBaner = $this->idUsuario ";
					$arrData = array(
					$this->nombreArchivo,
				
					$this->posicion);
	
				$request = $this->update($sql,$arrData);
	        return $request;
		}
		public function deleteBanner(int $IdBaner)
		{
			$this->intIdUsuario = $IdBaner;
			$sql = "UPDATE banner SET Habilitado = ? WHERE IdBaner = $this->intIdUsuario ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);
			return $request;
		}
		public function getunBanner($idusuario)
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