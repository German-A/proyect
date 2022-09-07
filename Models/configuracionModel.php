<?php 

	class ConfiguracionModel extends Mysql
	{


		public function __construct()
		{
			parent::__construct();
		}

		public function getoneEgresado($idusuario)
		{
			$sql = "SELECT * 
			FROM egresado e inner join
			usuario u on e.personaid=u.idpersona
			where u.idpersona = $idusuario
			";
			$request = $this->select($sql);			
			return $request;
		}

			/*Actualizar Datos del Egresado Foto*/
	public function updateFoto(int $idUsuario,  string $nuevonombre)
	{
		$this->intIdUsuario = $idUsuario;
		$this->strNombre = $nuevonombre;
		$sql = "UPDATE usuario SET  imagen=?
		WHERE idpersona = $this->intIdUsuario ";
		$arrData = array(
			$this->strNombre
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}











		public function lista()
		{
			$sql = "SELECT * FROM banner where Habilitado=1";
			$request = $this->select_all($sql);			
			return $request;
		}

		public function cantidadBanner()
		{
			$sql = "SELECT count(IdBaner) cant FROM banner where Habilitado = 1 order by FechaRegistro desc";
			$request = $this->select($sql);
			return $request;
		}

		public function register($nombreArchivo,$nuevonombre,$cantidad,$posicion){			
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

		public function toupdate($nombreArchivo,$nuevonombre,$cantidad,$idUsuario,$posicion){
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
		public function remove(int $IdBaner)
		{
			$this->intIdUsuario = $IdBaner;
			$sql = "UPDATE banner SET Habilitado = ? WHERE IdBaner = $this->intIdUsuario ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);
			return $request;
		}



	}
