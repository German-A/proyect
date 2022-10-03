<?php 

	class ExpoferialaboralxvadminModel extends Mysql
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

		public function listaGaleria()
		{
			$sql = "SELECT * FROM expoxvgaleria where status>0";
			$request = $this->select_all($sql);			
			return $request;
		}




		public function cantidadBanner()
		{
			$sql = "SELECT count(IdBaner) cant FROM banner where Habilitado = 1 order by FechaRegistro desc";
			$request = $this->select($sql);
			return $request;
		}

		public function register($txtNombre, $txtPosicion, $nuevonombre){			
			$this->txtNombre = $txtNombre;
			$this->txtPosicion = $txtPosicion;		
			$this->nuevonombre = $nuevonombre;
			$this->expoferiaslaboralesid = 2;
			$return = 0;
			$query_insert  = "INSERT INTO expoxvgaleria(nombre,posicion,archivo,expoferiaslaboralesid)
								  VALUES(?,?,?,?)";
	        	$arrData = array(
        						$this->txtNombre,
        						$this->txtPosicion,
								$this->nuevonombre,
        						$this->expoferiaslaboralesid
							);
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
