<?php 

	class ExpoferialaboralxvadminModel extends Mysql
	{
		private $idexpoxvgaleria;
		private $nombre;
		private $posicion;
		private $archivo;
		private $intborrar=0;

		public function __construct()
		{
			parent::__construct();
		}

		public function cantidadBanner()
		{
			$sql = "SELECT count(IdBaner) cant FROM banner where Habilitado = 1 order by FechaRegistro desc";
			$request = $this->select($sql);
			return $request;
		}

		public function listaGaleria()
		{
			$sql = "SELECT * FROM expoxvgaleria where status>0";
			$request = $this->select_all($sql);			
			return $request;
		}

		public function registerGaleria($txtNombre, $txtPosicion, $nuevonombre){			
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

		public function getOneGaleria($idexpoxvgaleria)
		{
			$sql = "SELECT * 
            FROM expoxvgaleria
            where status > 0 and idexpoxvgaleria = $idexpoxvgaleria
			";
			$request = $this->select($sql);			
			return $request;
		}
		public function removeImagen($idexpoxvgaleria)
		{
			$this->idexpoxvgaleria = $idexpoxvgaleria;
			$sql = "UPDATE expoxvgaleria SET status = ? WHERE idexpoxvgaleria = $this->idexpoxvgaleria ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);
			return $request;
		}


		public function updateGaleria($txtNombre, $txtPosicion, $nuevonombre,$idexpoxvgaleria){
			$this->nombre = $txtNombre;
			$this->posicion = $txtPosicion;
			$this->archivo = $nuevonombre;
			$this->idexpoxvgaleria = $idexpoxvgaleria;

			$sql = "UPDATE expoxvgaleria SET nombre=?,posicion=?,archivo=?
			WHERE idexpoxvgaleria = $this->idexpoxvgaleria ";
					$arrData = array(
					$this->nombre,
					$this->posicion,
					$this->archivo);	
				$request = $this->update($sql,$arrData);
	        return $request;
		}

		public function toupdate($txtNombre, $txtPosicion, $idexpoxvgaleria){
			$this->nombre = $txtNombre;
			$this->posicion = $txtPosicion;
			$this->idexpoxvgaleria = $idexpoxvgaleria;

			$sql = "UPDATE expoxvgaleria SET nombre=?,posicion=?
			WHERE idexpoxvgaleria = $this->idexpoxvgaleria ";
					$arrData = array(
					$this->nombre,				
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
