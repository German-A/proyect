<?php 

	class LegalnacionalModel extends Mysql
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

		public function lista()
		{
			$sql = "SELECT * FROM basenacional where Habilitado=1";
			$request = $this->select_all($sql);			
			return $request;
		}

		public function cantidadBanner()
		{
			$sql = "SELECT count(IdNacional) cant FROM basenacional where Habilitado = 1 order by FechaRegistro desc";
			$request = $this->select($sql);
			return $request;
		}

		public function register($nombreArchivo,$nuevonombre,$cantidad,$posicion){			
			$this->nombreArchivo = $nombreArchivo;
			$this->nuevonombre = $nuevonombre;
			$this->cantidad = $cantidad;
			$this->posicion = $posicion;
			$return = 0;
			$query_insert  = "INSERT INTO basenacional(Nombre,NombreArchivo,Posicion)
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
			$sql = "UPDATE basenacional SET Nombre=?, NombreArchivo=?, Posicion=?
			WHERE IdNacional = $this->idUsuario ";
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
			$sql = "UPDATE basenacional SET Nombre=?,Posicion=?
			WHERE IdNacional = $this->idUsuario ";
					$arrData = array(
					$this->nombreArchivo,
				
					$this->posicion);
	
				$request = $this->update($sql,$arrData);
	        return $request;
		}
		public function remove(int $IdBaner)
		{
			$this->intIdUsuario = $IdBaner;
			$sql = "UPDATE basenacional SET Habilitado = ? WHERE IdNacional = $this->intIdUsuario ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);
			return $request;
		}
		public function getone($idusuario)
		{
			$sql = "SELECT * 
            FROM basenacional
            where Habilitado=1 and IdNacional=$idusuario
			";
			$request = $this->select($sql);			
			return $request;
		}
	}
 ?>